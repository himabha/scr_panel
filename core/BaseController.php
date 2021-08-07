<?php 
require_once(BASE_PATH.'/core/BaseView.php');
require_once(BASE_PATH.'/core/BaseModel.php');
class BaseController{
	
	public function __construct(){
		
	}
	
	public function loadView($filename, $data = []){
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/views/'.strtolower(get_class($this).'/'.$filename.'.php'))){
			$filepath = $_SERVER['DOCUMENT_ROOT'].'/views/'.strtolower(get_class($this).'/'.$filename.'.php');
		}
		else if(file_exists($_SERVER['DOCUMENT_ROOT'].'/views/'.$filename.'.php')){
			$filepath = $_SERVER['DOCUMENT_ROOT'].'/views/'.$filename.'.php';
		}
		$view = new BaseView;
		$view->loadView($filepath, $data);
	}
	
	public function loadModel($model){
		$base_model = new BaseModel;
		return $base_model->loadModel($model);
	}
}
?>