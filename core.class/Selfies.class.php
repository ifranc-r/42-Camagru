<?php

require_once("Factory.class.php");

Class Selfies {
	private $_fact_obj_users = new Factory("selfies");
	private $_id_user;
	private $_id_selfie;
	private $_img_data;

	function __construct($id_user, $img_path){
		$this->_id_user = $id_user;
	}
}
?>