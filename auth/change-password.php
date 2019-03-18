<?php 

 require_once 'core/init.php';

 $user_data = $user-> get_data(Session::get('username'));
 $errors = array();

 //validasi
 if (Input::get('submit') ) {
	if(Token::check(Input::get('token'))){

 	// 1, Memanggil object valdasi
 	$validation = new Validation();

 	// 2. Metode Check
 	$validation = $validation-> check(array(
 		'password' => array(
 						'required' => true,
 						'min'      => 3,
         ),
         'password_baru' => array(
 						'required' => true,
 						'min'      => 3,
		 ),
		'password_verify' => array(
						'required' => true,
						'match'      => 'password_baru',
		),
 	));
     // 3. Lolos ujian
     
		if ( $validation-> passed()) {
            if( password_verify(Input::get('password'), $user_data['password'])){
                $user->update_user(array(
                'password' => password_hash(Input::get('password_baru'), PASSWORD_DEFAULT)
                ), $user_data['id']);

                Session::flash('profile','Selamat! password berhasil diganti');
                Redirect::to('profile');
            }else{
                $errors[] = 'Password lama salah';
            }
		}else{
			$errors = $validation->errors();
		}
		
	}
 }

 require_once 'templates/header.php';
?>

<form action="change-password.php" method="post">

	<label>Password</label>
	<input type="password" name="password"><br>

	<label>Password Baru</label>
	<input type="password" name="password_baru"><br>

    <label>Ulang Password Baru</label>
	<input type="password" name="password_verify"><br>

	<input type="hidden" name="token" value="<?= Token::generate()?>"><br>
	<input type="submit" name="submit" value="Simpan">
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