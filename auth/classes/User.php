<?php 

Class User{

	private $_db;

	public function __construct(){
		$this->_db = Database::getInstance();
	}

	public function register_user($fields = array()){

		if ( $this->_db->insert('user',$fields)) return true;
		else return false;
	}

	public function login_user($username, $password){
		
		$data = $this->_db->get_info('user','username',$username);
		if(password_verify($password, $data['password']) )
			return true;
		else return false;
	}

	public  function check_nama($username){
		$data = $this->_db->get_info('user','username',$username);
		if (empty($data)) return false;
		else return true;
	}
	public function is_admin($username){
		$data = $this->_db->get_info('user','username',$username);
		if ($data['role'] == 1) return true;
		else return false;
	}
	public function is_loggedIn(){
		if(Session::exists('username')) return true;
		else return false;
	}
	public function get_data($username){
		if ($this-> check_nama($username))
			return $this->_db->get_info('user','username',$username);
		else
			return die('Data tidak ditemukan');	
	}
	public function update_user($fields = array(), $id){
		if($this-> _db-> update('user', $fields, $id)) return true;
		else return false;
	}
}

?>