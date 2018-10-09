<?php
// Uncomment the follow lines for display PHP errors
/*
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
*/
date_default_timezone_set("America/Sao_Paulo");
$config = array();
define("BASE_URL", "http://localhost/micron/");
$config['dbname'] = 'micron';
$config['host'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';
global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}