<?php
class StudentModel extends BaseModel{
	
	private $tableName = 'students';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getStudents(){
		$stm = $this->connection->query("Select * from students");
		if($stm->execute()):
			return $stm->fetchAll();
		else:
			return false;
		endif;
	}
	
	public function addStudent($student){
		$stm = $this->connection->prepare("Insert into students values('', :firstname, :lasttname, :dob, :contact_no, :created_at, :modified_at)");
		$stm->bindValue(':firstname', $course['firstname'], PDO::PARAM_STR);
		$stm->bindValue(':lasttname', $course['lasttname'], PDO::PARAM_STR);
		$stm->bindValue(':dob', $course['dob'], PDO::PARAM_STR);
		$stm->bindValue(':contact_no', $course['contact_no'], PDO::PARAM_STR);
		$stm->bindValue(':created_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		return $stm->execute();
	}
}
?>