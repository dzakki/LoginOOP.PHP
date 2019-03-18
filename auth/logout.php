<?php 

 require_once 'core/init.php';

 Session::exists('username');
 session_destroy();
 
 Redirect::to('login');

?>