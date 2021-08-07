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
		$stm = $this->connection->prepare("Select * from courses");
		if($stm->execute()):
			return $stm->fetchAll();
		else:
			return false;
		endif;
	}
	
	public function addCourse($course){
		$stm = $this->connection->prepare("Insert into courses values('', :title, :detail, :created_at, :modified_at)");
		$stm->bindValue(':title', $course['title'], PDO::PARAM_STR);
		$stm->bindValue(':detail', $course['detail'], PDO::PARAM_STR);
		$stm->bindValue(':created_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		return $stm->execute();
	}
}
?>