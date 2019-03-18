<?php 
 require_once 'core/init.php';

 if ( !$user-> is_loggedIn()) {
	Session::flash('login','Anda harus login terlebih  dahulu');
	Redirect::to('login');
 }

 if(Session::exists('profile')){
	echo Session::flash('profile');
 }

 if(Input::get('nama')){
	$user_data = $user-> get_data( Input::get('nama'));	 
 }else{
	$user_data = $user-> get_data(Session::get('username'));
 }
 
 require_once 'templates/header.php';
?>
<h2>Profile</h2>
<h3>Selamat datang '<?php echo $user_data['username'] ?>' dengan akses <?= $user_data['role']?></h3>
<a href="change-password.php">Ganti password</a>
<?php if($user_data['username'] == Session::get('username')){ ?>
<?php 
if($user-> is_admin(Session::get('username'))){
	echo"ini khusus admin";
	}
}
require_once 'templates/footer.php'; 
?>