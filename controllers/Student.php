<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Student extends BaseController{
	public function __construct(){
		$this->model = $this->loadModel('Student');
	}
	
	public function index(){
		try{
			$students = $this->model->getStudents();
			$data = [
				'title' => 'Students',
				'students' => $students
			];
			$this->loadView("header", $data);
			$this->loadView("student/index", $data);
			$this->loadView("footer", $data);
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function add(){
		$data = [
			'title' => 'Add Student'
		];
		$this->loadView("header", $data);
		$this->loadView("add", $data);
		$this->loadView("footer", $data);
	}
	
	public function save(){
		try{
			$student = $_POST;
			if($this->model->addStudent($student)){
				$this->redirect('students');
			}
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function search(){
		try{
			$student = trim($_POST['searchtext']);
			$data['students'] = $this->model->getStudents($student);				
			$this->loadView('student/records', $data);
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function subscribe(){
		if(isset($_POST) && !empty($_POST)){
			$subscription = $_POST;
			$sc_model = $this->loadModel('Subscription');
			if($sc_model->saveSubscription($subscription)){
				$this->redirect('subscriptions');
			}
		}
		else{
			$students = $this->model->getStudents();
			$c_model = $this->loadModel('Course');
			$courses = $c_model->getCourses();
			$data = [
				'title' => 'Subscribe to Course',
				'students' => $students,
				'courses' => $courses
			];
			$this->loadView("header", $data);
			$this->loadView("student/subscribe", $data);
			$this->loadView("footer", $data);
		}
	}
}

?>