<?php
require_once(BASE_PATH.'/config/database.php');
class BaseModel {
	protected $connection;
	public function __construct(){
		$db = new Database;
		$this->connection = $db->getConnection();
	}
	
	public function loadModel($model){		
		require_once(BASE_PATH."/models/".$model.".php");
		$modelName = $model.'Model';
		$model_class = new $modelName($this->connection);
		return $model_class;
	}
}

?>