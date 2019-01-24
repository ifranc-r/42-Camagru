<?php
Class User_Model {
	private $_PDO;

	public function __construct(){
		require_once("load_PDO.php");
		$this->_PDO = load_PDO();
	}

	public function create($login, $pass, $admin){
		$insert_user = "INSERT INTO users (login, password, admin)
		VALUES ('$login', '$pass', $admin)";
		if (!$this->check_exist_login($login)){
			$this->_PDO->exec($insert_user);
		}
		else
			echo "user already exist";
	}

	public function modif($login, $newpass, $admin){
		$update_sql = "UPDATE users SET password='$newpass', admin=$admin WHERE login='$login'";
		if ($this->check_exist_login($login))
			$this->_PDO->exec($update_sql);
		else
			echo "user don't exist";
	}

	public function del($login){
		$delete_usr = "DELETE FROM users WHERE login='$login'";
		if ($this->check_exist_login($login)){
			$this->_PDO->exec($delete_usr);
		}
		else
			echo "user don't exist";
	}

	public function check_exist_login($login){
		$select = $this->_PDO->prepare("SELECT * FROM users WHERE login='$login'");
		$select->execute();
		$count = $select->rowCount();
		if ($count > 0)
			return True;
		else
			return False;
	}
	//prend information de tout ce que l'user a fait
	public function get_usr_info($login){
		if ($this->check_exist_login($login)){
			$select_usr = $this->_PDO->query("SELECT * FROM users WHERE login='$login'");
			$result = $select_usr->fetchAll()[0];
			return $result;
		}
		return False;
	}

	public function search($where){
		$search_sql = $this->_PDO->query("SELECT * FROM users WHERE $where");
		$result = $search_sql->fetchAll();
		return $result;
	}
}

?>