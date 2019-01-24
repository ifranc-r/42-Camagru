<?php

Class Factory {
	private $_PDO;
	private $_tab_name;

	public function __construct($tab_name){
		require_once("load_PDO.php");
		$this->_PDO = load_PDO();
		$this->_tab_name = $tab_name;
	}

	public function create($attributes, $values){
		try{
			$insert = "INSERT INTO $this->_tab_name ($attributes)
			VALUES ($values)";
			$this->_PDO->exec($insert);

			echo "New record created successfully";
		}
		catch(PDOException $e){
			echo $insert . "<br>" . $e->getMessage();
		}
	}

	public function modif($settings, $where){
		try{
			$update_sql = "UPDATE $this->_tab_name SET $settings WHERE $where";
			$this->_PDO->exec($update_sql);
			
			echo "Row has been updated successfully";
		}
		catch(PDOException $e){
			echo $update_sql . "<br>" . $e->getMessage();
		}
	}

	public function del($where){
		try{
			$delete_sql = "DELETE FROM $this->_tab_name WHERE $where";
			$this->_PDO->exec($delete_sql);
			
			echo "Row has been delete successfully";
		}
		catch(PDOException $e){
			echo $delete_sql . "<br>" . $e->getMessage();
		}
	}

	public function read($where){
		try{
			$read_sql = "SELECT * FROM $this->_tab_name WHERE $where";
			$select = $this->_PDO->query($read_sql);
			$result = $select->fetchAll();
			echo "Row has been returned successfully";
			return $result;
		}
		catch(PDOException $e)
		{
			echo $read_sql . "<br>" . $e->getMessage();
		}
	}
	//prend information de tout ce que l'user a fait
	public function count($where){
		try{
			$search_sql = "SELECT * FROM $this->_tab_name WHERE $where";
			$select = $this->_PDO->query($search_sql);
			$select->execute();
			$count = $select->rowCount();
			echo "There is $count of row where $where";
			return $count;
		}
		catch(PDOException $e)
		{
			echo $search_sql . "<br>" . $e->getMessage();
		}
	}
}

$fact_obj_users = new Factory("users");
// $fact_obj_users->create("login,password,admin", "'tuto', 'popi', 1");
// $fact_obj_users->modif("password='prout',admin=1", "login='titi'");
// $fact_obj_users->del("login='tuto'");
// print_r($fact_obj_users->read("login='into'"));
// $fact_obj_users->count("login='into'");




?>