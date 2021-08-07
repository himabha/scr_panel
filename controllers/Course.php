<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Course extends BaseController{
	
	public function __construct(){
		$this->model = $this->loadModel('Course');
	}
	
	public function index(){	
		$courses = $this->model->getCourses();
		$data = [
			'title' => 'Courses List',
			'courses' => $courses
		];
		$this->loadView("header", $data);
		$this->loadView("index", $data);
		$this->loadView("footer", $data);
	}
	
	public function add(){
		echo "pre";
		print_r($_POST);
		$data = [
			'title' => 'Courses List',
			'courses' => $courses
		];
		$this->loadView("header", $data);
		$this->loadView("index", $data);
		$this->loadView("footer", $data);
	}
}

?>