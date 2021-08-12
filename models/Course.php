<?php 
class CourseModel extends BaseModel{
	private $tableName = 'courses';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getCourses($searchBy = '', $orderBy = 'id', $sort = 'asc'){
		$where = "";
		if(isset($searchBy) && !empty($searchBy)){
			$where = " where course_name like :course_name OR detail like :detail OR created_at like :created_at OR modified_at like :modified_at";
		}
		$orderBy = " order by ".$orderBy." ".$sort;
		$query = "Select * from courses".$where.$orderBy;
		$stm = $this->connection->prepare($query);
		if(isset($searchBy) && !empty($searchBy)){
			$stm->bindValue(':course_name', '%'.$searchBy.'%', PDO::PARAM_STR);
			$stm->bindValue(':detail', '%'.$searchBy.'%', PDO::PARAM_STR);
			$stm->bindValue(':created_at', '%'.$searchBy.'%', PDO::PARAM_STR);
			$stm->bindValue(':modified_at', '%'.$searchBy.'%', PDO::PARAM_STR);
		}
		if($stm->execute()):			
			return $stm->fetchAll();
		else:
			return false;
		endif;
	}
	
	public function addCourse($course){
		$stm = $this->connection->prepare("Insert into courses values('', :course_name, :detail, :created_at, :modified_at)");
		$stm->bindValue(':course_name', $course['title'], PDO::PARAM_STR);
		$stm->bindValue(':detail', $course['detail'], PDO::PARAM_STR);
		$stm->bindValue(':created_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		return $stm->execute();
	}
	
	public function updateCourse($course){
		try
		{
			$query = "Update courses set course_name = :course_name, detail = :detail, modified_at = :modified_at where id = :course_id";
			$stm = $this->connection->prepare($query);
			$stm->bindValue(':course_id', $course['course_id'], PDO::PARAM_STR);
			$stm->bindValue(':course_name', $course['title'], PDO::PARAM_STR);
			$stm->bindValue(':detail', $course['detail'], PDO::PARAM_STR);
			$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
			return $stm->execute();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function deleteCourse($course){
		try{
			$stm = $this->connection->prepare("Delete from courses where id = :course_id");
			$stm->bindValue(':course_id', $course->id, PDO::PARAM_INT);
			return $stm->execute();
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function getCourseById($id){
		try{
			$stm = $this->connection->prepare("Select * from courses where id = :course_id");
			$stm->bindValue(':course_id', $id, PDO::PARAM_INT);
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