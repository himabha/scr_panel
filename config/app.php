<?php
class App{
	
	private $routes;
	
	public function __construct($routes){
		$this->routes = $routes;
	}
	
	public function load(){	
		if(!empty($_SERVER['QUERY_STRING'])){
			$q_string = trim($_SERVER['QUERY_STRING'], '/');
			$query_strings = explode("/", $q_string);
			$route_keys = array_keys($this->routes);
			$route_key = array_search($query_strings[0], $route_keys);
			if($route_key !== false){
				$this->setController($this->routes[$route_keys[$route_key]]);
			}
		}
		else{
			$this->setController($this->routes['default']);
		}
	}
	
	public function setController($c_path){
		$c_path = explode("/", $c_path);
		$classname = ucfirst($c_path[0]);
		require_once($_SERVER['DOCUMENT_ROOT'].'/controllers/'.$classname.'.php');		
		$methodname = $c_path[1];
		$obj = new $classname;
		echo $obj->$methodname();
	}
	
	
}
?>