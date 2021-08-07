<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Student extends BaseController{
	public function __construct(){
		$this->model = $this->loadModel('Student');
	}
	
	public function index(){
		$students = $this->model->getStudents();
		$data = [
			'title' => 'Students',
			'students' => $students
		];
		$this->loadView("header", $data);
		$this->loadView("index", $data);
		$this->loadView("footer", $data);
	}
}

?>