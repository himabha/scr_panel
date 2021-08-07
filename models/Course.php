<?php 
class CourseModel extends BaseModel{
	private $tableName = 'courses';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getCourses(){
		$stm = $this->connection->query("Select * from courses");
		return $rows = $stm->fetchAll();
	}
	
	
}
?>