<?php 

CLass Database{

	private static $INSTANCE = null;
	private $mysqli,
			$HOST = 'localhost',
			$USER = 'root',
			$PASS = '',
			$DBNAME = 'loginoop';

	public function __construct(){
		$this-> mysqli = new mysqli ($this-> HOST, $this-> USER, $this-> PASS, $this-> DBNAME);
		if (mysqli_connect_error()) {
			die('gagal koneksinya');
		}

	}

	/*
	Single pattern, menguji agar koneksi datavase tidak doble
	 */

	public static function getInstance(){
		if (!isset( self:: $INSTANCE)) {
			self:: $INSTANCE = new Database();
		}
		return self:: $INSTANCE;
	}

	public function insert($table,$fields = array()){

		//mengambilkolumn
		$colmun = implode(", ", array_keys($fields));

		//mengambil nilai
		
		$valuesArrays = array();
		$i = 0;
		foreach ($fields as $key => $values) {
		 if( is_int($values))	{
			$valuesArrays[$i] = $this->escape($values);
		 }else{
		 	$valuesArrays[$i] = "'" . $this->escape($values) . "'";
		 }

			$i++;
		}
		$values = implode(", ", $valuesArrays);

		$query = "INSERT INTO $table ($colmun) VALUES ($values)";

		return $this->run_query($query,'Masalah saat memasukkan data');

	}

	public function get_info($table, $column, $values){
		
		if( !is_int($values)) $values = "'". $values ."'";

		$query = "SELECT * FROM $table WHERE $column = $values";

		$result = $this->mysqli->query($query);
		while ($row = $result-> fetch_assoc()) {
			return $row;
		}
	}

	public function update($table, $fields, $id){
		//mengambil nilai
		
		$valuesArrays = array();
		$i = 0;
		foreach ($fields as $key => $values) {
			if( is_int($values))	{
			$valuesArrays[$i] =$key."=". $this->escape($values);
			}else{
			$valuesArrays[$i] = $key."='" . $this->escape($values) . "'";
			}

			$i++;
		}
		$values = implode(", ", $valuesArrays);

		$query = "UPDATE $table SET $values WHERE id=$id";
		//die($query);
		return $this->run_query($query,'Masalah saat ganti password');
	}

	public function run_query($query,$msg){
		if($this-> mysqli->query($query)) return true;
		else die ($msg);
	}

	public function escape($name){
		return $this-> mysqli->real_escape_string($name);
	}

}

//$db = 
//Database::getInstance();
//var_dump($db);

?>