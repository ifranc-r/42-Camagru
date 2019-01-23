<?php
Class User {
	private $_id_user;
	private $_login;
	private $_password;
	private $_admin;
	private $_PDO;

	public function load(){
		require_once("load_PDO.php");
		$this->_PDO = load_PDO();
	}

	public function create(){}
	public function modif(){}
	public function del(){}
	public function search(){}
	public function read(){}
	public function check_exist(){}
	//prend information de tout ce que l'user a fait
	public function get_usr_info(){}
}
?>