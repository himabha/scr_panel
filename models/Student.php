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
		return $rows = $stm->fetchAll();
	}
}
?>