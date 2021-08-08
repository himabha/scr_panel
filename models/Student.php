<?php
class StudentModel extends BaseModel{
	
	private $tableName = 'students';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getStudents($searchBy = ''){
		try{
			$where = "";
			if(isset($searchBy) && !empty($searchBy)){
				$where = " where firstname like :firstname OR lastname like :lastname OR email like :email OR dob like :dob OR contact_no like :contact_no OR created_at like :created_at OR modified_at like :modified_at";
				$skey = array_search(strtolower($searchBy), ['in-active', 'active', ]);
				if($skey === false){
					$where .= " OR (active = :active AND active = :inactive)";
				}
				else{
					$where .= " OR active = :active";
				}
			}
			$query = "Select * from students".$where;
			$stm = $this->connection->prepare($query);
			if(isset($searchBy) && !empty($searchBy)){
				$stm->bindValue(':firstname', '%'.$searchBy.'%', PDO::PARAM_STR);
				$stm->bindValue(':lastname', '%'.$searchBy.'%', PDO::PARAM_STR);
				$stm->bindValue(':email', '%'.$searchBy.'%', PDO::PARAM_STR);
				$stm->bindValue(':dob', '%'.$searchBy.'%', PDO::PARAM_STR);
				$stm->bindValue(':contact_no', '%'.$searchBy.'%', PDO::PARAM_STR);
				
				if($skey === false){
					$stm->bindValue(':active', 1, PDO::PARAM_INT);
					$stm->bindValue(':inactive', 0, PDO::PARAM_INT);
				}
				else{
					$stm->bindValue(':active', $skey, PDO::PARAM_INT);
				}
				
				$stm->bindValue(':created_at', '%'.$searchBy.'%', PDO::PARAM_STR);
				$stm->bindValue(':modified_at', '%'.$searchBy.'%', PDO::PARAM_STR);
			}		
			if($stm->execute()):	
				return $stm->fetchAll();
			else:
				return false;
			endif;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function addStudent($student){
		try
		{
			$stm = $this->connection->prepare("Insert into students values('', :firstname, :lastname, :email, :password, :dob, :contact_no, :active, :created_at, :modified_at)");
			$stm->bindValue(':firstname', $student['firstname'], PDO::PARAM_STR);
			$stm->bindValue(':lastname', $student['lastname'], PDO::PARAM_STR);
			$stm->bindValue(':email', $student['email'], PDO::PARAM_STR);
			$stm->bindValue(':password', md5($student['password']), PDO::PARAM_STR);
			$stm->bindValue(':dob', $student['dob'], PDO::PARAM_STR);
			$stm->bindValue(':contact_no', $student['contact_no'], PDO::PARAM_STR);
			$stm->bindValue(':active', $student['status'], PDO::PARAM_INT);
			$stm->bindValue(':created_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
			$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
			return $stm->execute();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function updateStudent($student){
		try
		{
			$query = "Update students set firstname = :firstname, lastname = :lastname, email = :email, dob = :dob, contact_no = :contact_no, active = :active, modified_at = :modified_at where id = :student_id";
			$stm = $this->connection->prepare($query);
			$stm->bindValue(':student_id', $student['student_id'], PDO::PARAM_STR);
			$stm->bindValue(':firstname', $student['firstname'], PDO::PARAM_STR);
			$stm->bindValue(':lastname', $student['lastname'], PDO::PARAM_STR);
			$stm->bindValue(':email', $student['email'], PDO::PARAM_STR);
			$stm->bindValue(':dob', $student['dob'], PDO::PARAM_STR);
			$stm->bindValue(':contact_no', $student['contact_no'], PDO::PARAM_STR);
			$stm->bindValue(':active', $student['status'], PDO::PARAM_INT);
			$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
			return $stm->execute();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function deleteStudent($student){
		try{
			$stm = $this->connection->prepare("Delete from students where id = :student_id");
			$stm->bindValue(':student_id', $student, PDO::PARAM_STR);
			return $stm->execute();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function getStudentById($id){
		try{
			$stm = $this->connection->prepare("Select * from students where id = :student_id");
			$stm->bindValue(':student_id', $id, PDO::PARAM_INT);
			if($stm->execute()):	
				return $stm->fetchObject();
			else:
				return false;
			endif;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function getStudentsNotSubscribed(){
		try{
			$stm = $this->connection->prepare("Select * from students join subscriptions sc on sc.where id = :student_id");
			$stm->bindValue(':student_id', $id, PDO::PARAM_INT);
			if($stm->execute()):	
				return $stm->fetchObject();
			else:
				return false;
			endif;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}
?>