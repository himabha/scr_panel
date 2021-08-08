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
			$this->loadView("course/index", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}		
	}
	
	public function add(){
		$data = [
			'title' => 'Add Course'
		];
		$this->loadView("header", $data);
		$this->loadView("course/add", $data);
		$this->loadView("footer", $data);
	}
	
	public function save(){
		try{
			if(isset($_POST['course_id']) && !empty($_POST['course_id'])){
				$course = $_POST;
				if($this->model->updateCourse($course)){
					$this->redirect('courses');
				}
			}else{
				$course = $_POST;
				if($this->model->addCourse($course)){
					$this->redirect('courses');
				}
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function search(){
		try {
			$course = trim($_POST['searchtext']);
			$data['courses'] = $this->model->getCourses($course);				
			$this->loadView('course/records', $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function delete($id){
		try{
			$course = $this->model->getCourseById($id);
			if($this->model->deleteCourse($course)){
				$this->redirect('courses');
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function edit($id){
		try{
			$course = $this->model->getCourseById($id);
			$data = [
					'title' => 'Edit Course',
					'course' => $course
				];
			$this->loadView("header", $data);
			$this->loadView("course/edit", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}

?>