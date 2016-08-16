<?php
require_once('vendor/autoload.php');
//require('vendor/bcosca/fatfree/lib/base.php');

$f3=Base::instance();

$f3->config('config.ini');
$f3->config('routes.ini');

$f3->route('GET /zz',
	function(){
	echo 'yyyy';
	}
);

$f3->run();

?>