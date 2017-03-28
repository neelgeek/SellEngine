<?php
require_once 'php/init.php';

$new = db::getInstance();
$user = new user();

$user->register('users', array(
	'username'=>'neel',
	'first_name'=>'Neel',
	'last_name'=>'Bhave'
	));



?>
