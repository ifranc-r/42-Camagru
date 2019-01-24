<?php

function load_PDO(){
	require_once("database.php");
	try {
		$PDO = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		));
		$ar = $PDO->query("SELECT * FROM users WHERE login='inti'");
		$result = $ar->fetchAll()[0];
		print_r($result);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}
load_PDO();
?>