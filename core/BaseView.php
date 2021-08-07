<?php 
class BaseView{
	
	protected $data;
	public function __construct(){
		
	}
	
	public function loadView($filename, $data = []){
		$this->data = $data;
        require($filename);
        $str = file_get_contents($filename);
        return $str;
		/* ob_start();
        // you can access $this->data in template
        require "views/" . $template . ".php";
        $str = ob_get_contents();
        ob_end_clean();
        return $str; */
	}

}?>