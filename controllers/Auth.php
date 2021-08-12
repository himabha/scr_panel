<?php
session_start();
require_once(BASE_PATH.'/core/BaseController.php');
class Auth extends BaseController{
	
	public function __construct(){
		$this->model = $this->loadModel('Auth');
	}
	
	public function checkAuth($route = null){
		try{
			if(isset($_SESSION['user'])){
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function login(){
		if(isset($_POST) && !empty($_POST)){
			$userdata = $this->model->checkUserData($_POST);
				if($userdata):
					$_SESSION['user'] = $userdata->id;
					$this->redirect('index');
			else:
				return false;
			endif;
		}else{
			$data = ['title' => 'Login'];
			$this->loadView('auth/login', $data);
		}
	}
	
	public function logout(){
		unset($_SESSION['user']);
		$this->redirect('login', );
	}
	
	
}