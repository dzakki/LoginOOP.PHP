<?php 

 require_once 'core/init.php';

 $errors = array();

 //validasi
 if (Input::get('submit') ) {
	if(Token::check(Input::get('token'))){

 	// 1, Memanggil object valdasi
 	$validation = new Validation();

 	// 2. Metode Check
 	$validation = $validation-> check(array(
 		'username' => array(
 						'required' => true,
 						'min'      => 3,
 						'max'      => 50,
 		),
 		'password' => array(
 						'required' => true,
 						'min'      => 3,
		 ),
		'password_verify' => array(
						'required' => true,
						'match'      => 'password',
		),
 	));
	 // 3. Lolos ujian
	if($user-> check_nama(Input::get('username'))) {
		$errors[] ='Username sudah terdaftar';
	}else{
		if ( $validation-> passed()) {
			$user->register_user(array(
			'username' => Input::get('username'), 
			'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
		));
			Session::flash('profile','Selamat! anda berhasil mendaftar');
			Session::set('username', Input::get('username'));
			Redirect::to('profile');
   
		}else{
			$errors = $validation->errors();
		}
	}	
	}
 }

 require_once 'templates/header.php';
?>

<form action="register.php" method="post">
	<label>Username</label>
	<input type="text" name="username"><br>

	<label>Password</label>
	<input type="password" name="password"><br>

	<label>Ulangi Password</label>
	<input type="password" name="password_verify"><br>

	<input type="hidden" name="token" value="<?= Token::generate()?>"><br>
	<input type="submit" name="submit" value="Daftar Sekarang">
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