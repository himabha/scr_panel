<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Student extends BaseController{
	public function __construct(){
		$model = $this->loadModel('Student');
	}
	
	public function index(){		
		$students = $model->getStudents();
		$data = [
			'title' => 'Students List',
			'students' => $students
		];
		$this->loadView("header", $data);
		$this->loadView("index", $data);
		$this->loadView("footer", $data);
	}
}

?>