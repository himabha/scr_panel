<?php 
class Database
{
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'student_cource';
	protected $connection;
	public function __construct(){
		
	}
	
	public function getConnection(){
		$this->connection = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname, $this->username, $this->password);
		$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		return $this->connection;
	}
}

 
?>