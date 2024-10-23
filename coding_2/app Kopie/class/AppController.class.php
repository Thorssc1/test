<?php
class AppUserException extends Exception {}
class AppController {

	private $page = 'home';
	private $action = false;
	private $args = false;
	private $registry = array();
	private $_page = array();
	static private $_messages = array();

	public $validActions = array();

	public function __construct($route = false){
		//Pages, registered for routing
		$this->registry['home'] = array('label'=>false);
		$this->registry['support'] = array('label'=>"Support");
		$this->registry['download'] = array('label'=>"Download");


		session_start();
		$route = trim($route,'/');
		if($route){
			list($this->page,$this->action,$this->args) = explode('/',$route);
		}
	}

	public function getCurrentPage(){
		return $this->page;
	}
	public function getCurrentAction(){
		return $this->action;
	}
	public function getCurrentArgs(){
		return $this->args;
	}
	public function getPageProperty($property){
		return $this->_page[$property];
	}
	public function setPageProperty($property,$value){
		$this->_page[$property] = $value;
	}

	/**
	* Add FlashMessage (simple for now)
	*
	* @param string $message
	* @param string $type (success, info, warning, danger)
	*/
	public function addFlashMessage($message, $type = 'info'){
		self::$_messages[] = array('t'=>$type,'m'=>$message);
	}


	/**
	* Run
	*
	*/
	public function run(){
		if(!$this->registry[$this->page]){
			$this->_page['title'] = '404 not found';
			$this->_page['content'] = <<<ERR
			<div class="alert alert-danger">
        <strong>404 not found</strong> Seite wurde nicht gefunden.
      </div>
ERR;
			return;
		}

		//Defaults
		$this->_page['title'] = $this->registry[$this->page]['label'];

		try {
			$_page = ucfirst($this->page);
			$page_class = "{$_page}Controller";
			if(!file_exists(APP_ROOT."class/{$page_class}.class.php")){
				throw new Exception("File not found: ".APP_ROOT."class/{$page_class}.class.php",404);
			}
			$_page = ucfirst($this->page);
			require_once(APP_ROOT."class/{$_page}Controller.class.php");
			$page_controller = new $page_class($this);

			//Run
			$runMethod = 'run'.ucfirst($this->action);
			$outputMethod = 'output'.ucfirst($this->action);
			if(in_array($this->action,$page_controller->validActions) && method_exists($page_controller,$runMethod)){
				$page_controller->$runMethod($this->args);//Specific Action
			}else{
				$outputMethod = false;
				$page_controller->run();//Default Action
			}

			//Output
			if($outputMethod && method_exists($page_controller,$outputMethod)){
				$this->_page['content'] = $page_controller->$outputMethod();//Action Output
			}else{
				$this->_page['content'] = $page_controller->output();//Default Output
			}

		} catch(AppUserException $e){
			$this->_page['title'] = 'Fehler: '.$e->getCode();
			$file_anon = substr(sha1($e->getFile()),-10);
			$this->_page['content'] = <<<ERR
			<div class="alert alert-warning">
        <strong>{$e->getMessage()}</strong><br>
        <small>Fehlerquelle: {$file_anon}:{$e->getLine()}</small>
      </div>
ERR;
		} catch(Exception $e){
			$this->_page['title'] = 'Fehler: '.$e->getCode();
			$this->_page['content'] = <<<ERR
			<div class="alert alert-danger">
        <strong>{$e->getMessage()}</strong><br>
        <small>Fehlerquelle: {$e->getFile()}:{$e->getLine()}</small>
      </div>
ERR;
		}

	}

	/**
	* Output Content in Template
	*
	*/
	public function output(){
		$browser_title = $this->_page['browser_title'];
		$page_title = $this->_page['title'];
		if(!$browser_title){
			$browser_title = $page_title;
		}
		$page_content = $this->_page['content'];

		//Flash Messages
		if(self::$_messages){
			$page_messages = '';
			foreach(self::$_messages as $item){
				$item['t'] = ($item['t']==='error') ? 'danger' : $item['t'];
			$page_messages .= <<<FLASH
			<div class="alert alert-{$item['t']} fade in">
				<button class="close" data-dismiss="alert">×</button>
				{$item['m']}
			</div>
FLASH;
			}
		}

		ob_start();
		include(APP_ROOT.'template/default.inc.php');
		return ob_get_clean();
	}

}
