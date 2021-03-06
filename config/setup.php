<?php

function load(){
	require_once("database.php");
	try {
		$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		));
		$sql_data = file_get_contents("request_database.sql");
		$dbh->exec($sql_data);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}
load();
?>