<?php
class App{
	
	private $routes;
	
	public function __construct($routes){
		$this->routes = $routes;
	}
	
	public function load(){
		if(!empty($_SERVER['QUERY_STRING'])){
			$q_string = ltrim($_SERVER['QUERY_STRING'], '/');
			$route_keys = array_keys($this->routes);
			$route_key = array_search($q_string, $route_keys);
			if($route_key !== false){
				$this->setController($this->routes[$route_keys[$route_key]]);
				return false;
			}else{
				$query_strings = explode("/", $q_string);
				if(count($query_strings) > 2){
					$act_query_strings = $query_strings;
					$omit_strings = array_splice($query_strings, 2, count($query_strings)-2);
					$str = implode($query_strings, "/")."/";
					$pattern = '/^'.preg_quote($str, '/') .'[(:any)\/*]+$/';
					$routes = preg_grep($pattern, $route_keys);
					$route_found = reset($routes);
					$route_key = $this->routes[$route_found];
					//controller path from routing file
					$r_vals = explode("/", $route_key);
					//route path from routing file
					$route_vals = explode("/", $route_found);
					if(count($route_vals) === count($act_query_strings) && count($route_vals) === count($r_vals)){
						array_splice($r_vals, 2, count($r_vals)-2);					
						$path = implode($r_vals, "/");				
						$this->setController($path, $omit_strings);
					}
					else{
						throw new Exception("Route does not match.");
					}
				}else{
					$route_key = array_search($query_strings[0], $route_keys);
					if($route_key !== false){
						$this->setController($this->routes[$route_keys[$route_key]]);
					}
				}
			}
		}
		else{
			$this->setController($this->routes['default']);
		}
	}
	
	public function setController($c_path, $params = []){
		$c_path = explode("/", $c_path);
		$classname = ucfirst($c_path[0]);
		require_once($_SERVER['DOCUMENT_ROOT'].'/controllers/'.$classname.'.php');		
		$methodname = $c_path[1];
		$obj = new $classname;
		if(!empty($params)):
			call_user_func_array(array($obj, $methodname), $params);
		else:
			$obj->$methodname();
		endif;
	}
	
	
}
?>