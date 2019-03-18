<!DOCTYPE html>
<html>
<head>
	<title>Login & Register OOp</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

<header>
	<h1>Belajar Login dan Register Sekolah Koding</h1>
	<nav>
	<?php if(Session::exists('username') ){ ?>
		<a href="profile.php">Profile</a>
		<a href="logout.php">Logout</a>
	<?php } else{ ?>
		<a href="login.php">Login</a>
		<a href="register.php">Register</a>
	<?php }?>
	</nav>
</header>