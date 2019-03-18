<?php 

 require_once 'core/init.php';
if ($user->is_loggedIn()) {
	Redirect::to('profile');
}
if(Session::exists('login')){
	echo(Session::flash('login'));
}
 $errors = array();

 //validasi
 if (Input::get('submit') ) {
	// check token
	if(Token::check(Input::get('token'))){
 	// 1, Memanggil object valdasi
 	$validation = new Validation();

 	// 2. Metode Check
 	$validation = $validation-> check(array(
 		'username' => array('required' => true
 					),
 		'password' => array('required' => true
 					)
 	));
 	// 3. Lolos ujian
 	if ( $validation-> passed()) {
 		if($user->check_nama(Input::get('username')) ){
	 		if ($user->login_user(Input::get('username'),Input::get('password')) ){
	 			Session::set('username', Input::get('username'));
	 			Redirect::to('profile');
	 		}else{
	 			$errors[] = "Login Gagal";
	 		}
	 	}else{
	 		$errors[] = "Username belum terdaftar";
	 	}
 	}else{
 		$errors = $validation->errors();
 	}

	}
 }

 require_once 'templates/header.php';
?>

<form action="login.php" method="post">
	<label>Username</label>
	<input type="text" name="username"><br>

	<label>Password</label>
	<input type="password" name="password"><br>
	<input type="hidden" name="token" value="<?= Token::generate()?>"><br>
	<input type="submit" name="submit" value="Login Sekarang">
	<?php 
	if (!empty($errors)) {
		foreach ($errors as $error) {
			echo "<p>".$error."</p>";
		}
	}
	?>
</form>

<?php 
 require_once 'templates/footer.php';
?>