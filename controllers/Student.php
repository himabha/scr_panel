<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Student extends BaseController{
	public function __construct($activeRoute){
		$this->activeRoute = $activeRoute;
		$this->model = $this->loadModel('Student');
	}
	
	public function index(){
		try{
			$students = $this->model->getStudents();
			$data = [
				'activeRoute' => $this->activeRoute,
				'title' => 'Students',
				'students' => $students
			];
			$this->loadView("header", $data);
			$this->loadView("student/index", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function add(){
		$data = [
			'activeRoute' => $this->activeRoute,
			'title' => 'Add Student'
		];
		$this->loadView("header", $data);
		$this->loadView("student/add", $data);
		$this->loadView("footer", $data);
	}
	
	public function save(){
		try{
			if(isset($_POST['student_id']) && !empty($_POST['student_id'])){
				$student = $_POST;
				if($this->model->updateStudent($student)){
					$this->redirect('students');
				}
			}else{
				$student = $_POST;
				if($this->model->addStudent($student)){
					$this->redirect('students');
				}
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function search(){
		try{
			$student = trim($_POST['searchtext']);
			$data['students'] = $this->model->getStudents($student);				
			$this->loadView('student/records', $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function delete($id){
		try{
			$student = $this->model->getStudentById($id);
			if($this->model->deleteStudent($student)){
				$this->redirect('students');
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function edit($id){
		try{
			$student = $this->model->getStudentById($id);
			$data = [
					'activeRoute' => $this->activeRoute,
					'title' => 'Edit Student',
					'student' => $student
				];
			$this->loadView("header", $data);
			$this->loadView("student/edit", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function sort(){
		try{
			$searchValue = $_POST['searchValue'];
			$orderBy = $_POST['columnName'];
			$sort = $_POST['sort'];
			$sort = ($sort >= 0) ? 'asc' : 'desc';
			$data = [
				'students' => $this->model->getStudents($searchValue, $orderBy, $sort),
				'orderBy' => $orderBy,
				'sort' => $sort
			];
			$this->loadView('student/records', $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}

?>