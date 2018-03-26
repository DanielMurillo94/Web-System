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

    echo "Chocalas";
     
//update the employee
    $stmt = $employee->modify($_POST['id'],$_POST['nombre'],$_POST['edad'],$_POST['direccion'],$_POST['estado'],$_POST['fechaNac'],$_POST['telefono']);

//update data for the economical
    $stmt = $economic->modify($_POST['id'],$_POST['puesto'],$_POST['salario']);

//Add the knowledge
    $n = 0;
    $arrLeng = $_POST['lenguajes'];
    $arrPor = $_POST['porcentajes'];
    $arrID = $_POST['idKnow'];
    $arrAct = $_POST['action'];
    foreach ($arrLeng as $leng) {
    	$langID = $languages->readOne($arrLeng[$n]);
    	if($langrow = $langID->fetch(PDO::FETCH_ASSOC)){
            echo "language not added";
    	}
    	else{
    		$languages->create($arrLeng[$n]);
            echo "language added";
    	}
        //mod elim create
        if($arrAct[$n] == "create"){
            $langID = $languages->readOne($arrLeng[$n]);
            while(!($langrow = $langID->fetch(PDO::FETCH_ASSOC))){
                $langID = $languages->readOne($arrLeng[$n]);
            }
            //echo "id language".$langrow['id']."<hr>";
            //echo "porcentaje".$arrPor[$n]."<hr>";
            //echo "id empleado".$emprow['id']."<hr>";
            $knowledge->create($langrow['id'], $arrPor[$n],$_POST['id']);
            echo "Created ".$arrLeng[$n];
        }
        elseif ($arrAct[$n] == "elim") {
            $knowledge->eraseknow($arrID[$n]);
            echo "Erased ".$arrLeng[$n];

        }
        elseif ($arrAct[$n] == "mod") {
            $knowledge->modify($arrID[$n],$arrLeng[$n], $arrPor[$n]);
            echo "modificated ".$arrLeng[$n];
        }

    	
    	$n = $n + 1;
	}
    //Recorrer los arreglos
    //Buscar si existen en la base de datos
    //Si no existen los agregas
    //Agregar al chavo
   
?>