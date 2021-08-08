<?php 
class SubscriptionModel extends BaseModel{
	private $tableName = 'subscriptions';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTableName(){
		return $this->tableName;
	}
	
	public function getSubscriptions($searchBy = ''){
		$where = "";
		if(isset($searchBy) && !empty($searchBy)){
			$where = " where c.course_name like :course_name OR s.firstname like :student_name OR s.lastname like :student_name OR sc.created_at like :created_at OR sc.modified_at like :modified_at";
		}
		$query = "Select sc.id, CONCAT(firstname, ' ', lastname) as fullname, course_name from subscriptions sc join students s on s.id = sc.student_id join courses c on c.id = sc.course_id".$where;
		$stm = $this->connection->prepare($query);
		if(isset($searchBy) && !empty($searchBy)){
			$stm->bindValue(':course_name', '%'.$searchBy.'%', PDO::PARAM_STR);
			$stm->bindValue(':student_name', '%'.$searchBy.'%', PDO::PARAM_STR);
			$stm->bindValue(':created_at', '%'.$searchBy.'%', PDO::PARAM_STR);
			$stm->bindValue(':modified_at', '%'.$searchBy.'%', PDO::PARAM_STR);
		}
		if($stm->execute()):			
			return $stm->fetchAll();
		else:
			return false;
		endif;
	}
	
	public function saveSubscription($subscription){
		$stm = $this->connection->prepare("Insert into subscriptions values('', :student_id, :course_id, :created_at, :modified_at)");
		$stm->bindValue(':student_id', $subscription['student'], PDO::PARAM_INT);
		$stm->bindValue(':course_id', $subscription['course'], PDO::PARAM_INT);
		$stm->bindValue(':created_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		$stm->bindValue(':modified_at', date("Y-m-d H:i:s"), PDO::PARAM_STR);
		return $stm->execute();
	}
}
?>