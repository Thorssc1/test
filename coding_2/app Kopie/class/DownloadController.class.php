<?php

class DownloadController extends AppController{

	/**
	* Reference to PKC
	*
	* @var AppController
	*/
	private $appController;

	public function __construct(AppController $C){
		$this->appController = $C;
	}

	public function run(){
		$this->appController->setPageProperty('title',false);
		$this->appController->setPageProperty('browser_title',"Download");

		if($_POST['anfrage']){

			$this->addFlashMessage(_("Ihre Anfrage wurde erfolgreich verschickt!"),'success');
		}

		return "HOME!";
	}

	/**
	* Output Content in Template
	*
	*/
	public function output(){
		ob_start();
		include(APP_ROOT.'template/download.inc.php');
		return ob_get_clean();
	}
}
