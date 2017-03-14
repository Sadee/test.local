<?php

class parentclass {

	public static $_var = '';

	public function __construct(){

	}

	public function displayval($x){
		echo self::$_var.'-'.$x.'<br/>';
	}
}

class firstchild extends parentclass {
	
	public function changevalue($val){
		parent::$_var = $val;
	}
}


class secondchild extends parentclass {
	
	public function changevalue($vals){
		parent::$_var = $vals;
	}
}
