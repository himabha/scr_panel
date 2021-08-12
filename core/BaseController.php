<?php 
require_once(BASE_PATH.'/core/BaseView.php');
require_once(BASE_PATH.'/core/BaseModel.php');
class BaseController{
	
	public function __construct(){
		
	}
	
	public function loadView($filename, $data = []){
		/* if(file_exists($_SERVER['DOCUMENT_ROOT'].'/views/'.strtolower(get_class($this).'/'.$filename.'.php'))){
			echo $filepath = $_SERVER['DOCUMENT_ROOT'].'/views/'.strtolower(get_class($this).'/'.$filename.'.php');
		} */
		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/views/'.$filename.'.php')){
			$filepath = $_SERVER['DOCUMENT_ROOT'].'/views/'.$filename.'.php';
			$view = new BaseView;
			$view->loadView($filepath, $data);
		}
		else{
			//throw new Exception('View not found');
			header("HTTP/1.0 404 Not Found");
			echo "<h1>404 Not Found</h1>";
			echo "View not Found.";
			exit();
		}
	}
	
	public function loadModel($model){
		$base_model = new BaseModel;
		return $base_model->loadModel($model);
	}
	
	public function redirect($route){
		header("Location: ".(_is_https() ? "https://" : "http://").SITE_URL."/".$route);
		die();
	}
}
?>