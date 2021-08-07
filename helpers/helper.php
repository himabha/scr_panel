<?php
if(!function_exists('_pr')){
	function _pr($arr){
		echo "<pre>";
		print_r($arr);
		exit;
	}
}

if(!function_exists('_dump_pdo')){
	function _dump_pdo($stm){
		echo "<pre>";
		$stm->debugDumpParams();
	}
}

if(!function_exists('_is_https')){
	function _is_https(){
		return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
	}
}
?>