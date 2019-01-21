<?php
require_once("database.php");
try {
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}
function install_db(){
	try {
		$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
	create_tab_usr($con_to_db);
	create_tab_products($con_to_db);
	create_tab_orders($con_to_db);
	field_db_users();
	field_db_products();
}
install_db();
?>