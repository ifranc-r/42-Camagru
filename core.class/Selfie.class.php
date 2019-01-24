<?php


Class Selfie {
	private $_fact_obj;
	private $_id_user;
	private $_id_selfie;
	private $_img_data;

	function __construct($id_user, $img_path){
		require_once("Factory.class.php");
		$this->_fact_obj = new Factory("selfies");
		$this->_id_user = $id_user;
		$this->_img_data = addslashes(file_get_contents($img_path));
		$att = "id_user,img_data";
		$value = "$id_user,'$this->_img_data'";
		$this->_fact_obj->create($att, $value);
		$this->_id_selfie = $this->_fact_obj->last_id();
	}

	function __toString(){
		return "Img was uploaded by id_usr:$this->$_id_user id_selfie:$this->_id_selfie";
	}

	function set_img($img_path){
		$this->_img_data = addslashes(file_get_contents($img_path));
		$this->_fact_obj->modif("img_data='$this->_img_data'", "id_selfie='$this->_id_selfie'");
	}

	function get_img(){return $this->_img_data;}
	function get_id_selfie(){return $this->_id_selfie;}
	function get_id_user(){return $this->_id_user;}
}

$self = new Selfie(1, "../images.png");

?>