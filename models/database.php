<?php
function getDB() {
	try
	{
		include 'myconfig.php';
		$bdd = new PDO($db_url, $db_login, $db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	return $bdd;
}
?>