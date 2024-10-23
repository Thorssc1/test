<?php

class SupportController extends AppController{

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
		$this->appController->setPageProperty('browser_title',"Support");

		if($_POST['anfrage']){

            //ini_set('display_errors', 'on');
            // check email
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->addFlashMessage(_("Ihre E-Mail Adresse ist fehlerhaft."),'error');

                return "HOME!";
            }


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
		include(APP_ROOT.'template/support.inc.php');
		return ob_get_clean();
	}
}
