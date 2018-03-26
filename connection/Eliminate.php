<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once 'database.php';
include_once 'employee.php';
include_once 'economic.php';
include_once 'knowledge.php';
include_once 'language.php';
 
$database = new Database();
$db = $database->connect();
 
$employees = new employee($db);
$economic = new economic($db);
$knowledge = new knowledge($db);
$language = new language($db);
//Crear datos economicos
 
// query 
$knowledge->erase($_POST['id']);
$economic->erase($_POST['id']);
$employees->erase($_POST['id']);

?>