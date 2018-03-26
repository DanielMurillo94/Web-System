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
$stmt = $employees->read();
$num = $stmt->rowCount();


 
// check if more than 0 record found
if($num>0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<div class='row border border-primary rounded'>
        <div class = 'col-md-12 liActive'>
            <div class='row'>
                <h2 class = 'col-md-10 liActive'>$nombre</h2>
                <a href='update.php?ide=".$id."' class='btn btn-light' role='button' aria-disabled='true'>Modificar</a>
                <button type='button' class='col-md-1 btn btn-danger' value='$id' onclick='eliminar($id)'>Eliminar</button>
            </div>
        </div>
        <div class = 'row col-md-12'>
            <div class = 'col-md-7'>
                <p>
                    <b>Edad: </b>$edad<br>
                    <b>Direccion</b> $direccion<br> 
                    <b>Nacimiento</b> $fecha_nacimiento <br> 
                    <b>Telefono</b> $telefono<br>";
        $stmtemp = $economic->read($id);
        $emprow = $stmtemp->fetch(PDO::FETCH_ASSOC);
            echo"<b>Puesto</b> ".$emprow['puesto'] ."<br>
                    <b>Salario</b>".$emprow['salario']."<br>";
        echo"        </p>
            </div>";
        $stmtkno = $knowledge->read($id);
        echo"<div class = 'col-md-5'>
                <ul class = 'list-group'>
                <li class='list-group-item liActive noPadding'>Lenguajes</li>";
        while ($knorow = $stmtkno->fetch(PDO::FETCH_ASSOC)){
            echo "<li class='list-groupt-group-item d-flex justify-content-between align-items-center noPadding'>".$knorow['lenguaje']."<span class='badge badge-primary badge-pill liActive'>".$knorow['porcentaje']."%</span></li>";
        }
        echo "</ul>
            </div>
        </div>
        </div>";
    }
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>