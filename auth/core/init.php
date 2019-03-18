<?php 

session_start();

//load classes

spl_autoload_register(function($class){
	require_once 'classes/' .$class .'.php';
});

$user = new User();
?>