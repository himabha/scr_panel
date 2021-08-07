<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Course extends BaseController{
	
	public function __construct(){
		$this->model = $this->loadModel('Course');
	}
	
	public function index(){
		try{
			$courses = $this->model->getCourses();
			$data = [
				'title' => 'Courses',
				'courses' => $courses
			];
			$this->loadView("header", $data);
			$this->loadView("index", $data);
			$this->loadView("footer", $data);
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}		
	}
	
	public function add(){
		$data = [
			'title' => 'Add Course'
		];
		$this->loadView("header", $data);
		$this->loadView("add", $data);
		$this->loadView("footer", $data);
	}
	
	public function save(){
		try{
			$course = $_POST;
			if($this->model->addCourse($course)){
				$this->redirect('courses');
			}
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}
	}
}

?>