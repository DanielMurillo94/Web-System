<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once 'database.php';
include_once 'employee.php';
include_once 'economic.php';
include_once 'language.php';
include_once 'knowledge.php';
 
$database = new Database();
$db = $database->connect();
 
$employee = new employee($db);
$economic = new economic($db);
$languages = new language($db);
$knowledge = new knowledge($db);
 
//Create the employee
    $stmt = $employee->create($_POST['nombre'],$_POST['edad'],$_POST['direccion'],$_POST['estado'],$_POST['fechaNac'],$_POST['telefono']);
//Add the data for the economical
    $empid = $employee->getid($_POST['nombre'],$_POST['edad'],$_POST['direccion'],$_POST['estado'],$_POST['fechaNac'],$_POST['telefono']);
    $emprow = NULL;
    while (!($emprow = $empid->fetch(PDO::FETCH_ASSOC))){
       $empid = $employee->getid($_POST['nombre'],$_POST['edad'],$_POST['direccion'],$_POST['estado'],$_POST['fechaNac'],$_POST['telefono']); 
    }
    //if($emprow = $empid->fetch(PDO::FETCH_ASSOC)){
            $stmt = $economic->create($emprow['id'],$_POST['puesto'],$_POST['salario']);
            echo "Created the economic";
    //}
    //else{
    	//echo "Not created the economic";
    //}
//Add the languages
    $n = 0;
    $arrLeng = $_POST['lenguajes'];
    $arrPor = $_POST['porcentajes'];
    foreach ($arrLeng as $leng) {
    	$langID = $languages->readOne($arrLeng[$n]);
    	if($langrow = $langID->fetch(PDO::FETCH_ASSOC)){
            echo "language not added";
    	}
    	else{
    		$languages->create($arrLeng[$n]);
            echo "language added";
    	}
    	$langID = $languages->readOne($arrLeng[$n]);
    	$langrow = $langID->fetch(PDO::FETCH_ASSOC);
    	$empid = $employee->getid($_POST['nombre'],$_POST['edad'],$_POST['direccion'],$_POST['estado'],$_POST['fechaNac'],$_POST['telefono']);
    	$emprow = $empid->fetch(PDO::FETCH_ASSOC);
    	echo "id language".$langrow['id']."<hr>";
    	echo "porcentaje".$arrPor[$n]."<hr>";
    	echo "id empleado".$emprow['id']."<hr>";
    	$knowledge->create($langrow['id'], $arrPor[$n],$emprow['id']);
        echo "Added knowledge";
    	$n = $n + 1;
	}
    //Recorrer los arreglos
    //Buscar si existen en la base de datos
    //Si no existen los agregas
    //Agregar al chavo
   
?>