<?php

function load_PDO(){
	require_once("../config/database.php");
	try {
		$PDO = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		));
		return $PDO;
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}

?>