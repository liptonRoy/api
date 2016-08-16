<?php
class Controller{
	//protected $f3;
	protected $db;
	
	function beforeroute(){
		echo 'before running- ';
	}
	
	function afterroute(){
		echo ' -after running';
	}
	
	
}
?>