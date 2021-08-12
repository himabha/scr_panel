<?php 
class AuthModel extends BaseModel{
	private $tableName = 'users';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function checkUserData($record){
		try{
			if(!empty($record)):
				$query = "Select * from users where username=:username AND password = :password";
				$stm = $this->connection->prepare($query);
				$stm->bindValue(':username', $record['username'], PDO::PARAM_STR);
				$stm->bindValue(':password', md5($record['password']), PDO::PARAM_STR);
				if($stm->execute()):			
					return $stm->fetchObject();
				else:
					return false;
				endif;
			endif;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}
?>