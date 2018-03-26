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

	$states = array("Aguascalientes","Baja California","Baja California Sur","Campeche","Chiapas","Chihuahua","Ciudad de México","Coahuila","Colima","Durango","Guanajuato","Guerrero","Hidalgo","Jalisco","México","Michoacán","Morelos","Nayarit","Nuevo León","Oaxaca","Puebla","Querétaro","Quintana Roo","San Luis Potosí","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","Yucatán","Zacatecas");
 
	$employee = new employee($db);
	$economic = new economic($db);
	$languages = new language($db);
	$knowledge = new knowledge($db);

	//Sets the values of the employee
	$empid = $employee->get($_POST['id']);
    $emprow = $empid->fetch(PDO::FETCH_ASSOC);

	echo "<form>
  <h3>Datos Generales</h3>
  <hr>
  <div class='form-group'>
    <label for='inNombre'>Nombre</label>
    <input type='text' class='form-control' id='inNombre' placeholder='Nombre' value = '".$emprow['nombre']."'>
  </div>
  <div class='form-group'>
    <label for='inEdad'>Edad</label>
    <input type='number' class='form-control' id='inEdad' placeholder='Edad' value = '".$emprow['edad']."'>
  </div>
  <div class='form-group'>
    <label for='inDireccion'>Direccion</label>
    <input type='text' class='form-control' id='inDireccion' placeholder='Dirección' value = '".$emprow['direccion']."'>
  </div>
  <div class='form-group'>
    <label for='inEstado'>Estado</label>
    <select class='form-control' id='inEstado' value = '".$emprow['estado']."'>";
    for ($i = 1; $i <= 10; $i++) {
    	echo "<option value='".$i."'";
    	if( $i == $emprow['estado']){
    		echo " selected ";
    	}
    	echo ">".$states[$i]."</option>";
	}
      
    echo "</select>
	  </div>
	  <div class='form-group'>
	    <label for='inFechaNac'>Fecha de nacimiento</label>
	    <input type='Date' class='form-control' id='inFechaNac' placeholder='Fecha de nacimiento' value = '".$emprow['fecha_nacimiento']."'>
	  </div>
	  <div class='form-group'>
	    <label for='inTelefono'>Teléfono</label>
	    <input type='text' class='form-control' id='inTelefono' placeholder='Teléfono' value = '".$emprow['telefono']."'>
	  </div>";

  	//Sets the values of the economic data

	$ecid = $economic->get($_POST['id']);
    $ecrow = $ecid->fetch(PDO::FETCH_ASSOC);
	 echo "<h3>Datos Económicos</h3>
	  <hr>
	   <div class='form-group'>
	    <label for='inPuesto'>Puesto</label>
	    <input type='text' class='form-control' id='inPuesto' placeholder='Puesto' value = '".$ecrow['puesto']."'>
	  </div>
	   <div class='form-group'>
	    <label for='inSalario'>Salario</label>
	    <input type='number' class='form-control' id='inSalario' placeholder='Salario' value = '".$ecrow['salario']."''>
	  </div>
	  <div class='form-group'>";

  	//Sets the knowledge values
	$knoid = $knowledge->get($_POST['id']);
    
    echo "  <h3>Conocimiento</h3>
		  <hr>
		    <div class='row justify-content-around'>
		      <input type='text' class='form-control col-md-4' id='inLenguaje' placeholder='lenguaje'>
		      <input type='number' class='form-control col-md-4' id='inPorcentaje' placeholder='Porcentaje'>
		      <button id='addButton' type='button' class='btn btn-primary col-md-1'>Agregar</button>
		      <input type='hidden' id='nLenguajes' val = '0'>
		    </div>
		    <div id = 'inlanguages'>";
	$nl = 0;
	while ($knorow = $knoid->fetch(PDO::FETCH_ASSOC)){
		echo "<div class='row justify-content-around'  id = 'knowinputs".$nl."' ><input id='inLenguaje".$nl."' type='text' class='form-control col-md-4' placeholder='lenguaje' readonly value='".$knorow['lenguaje']."'><input id='inPorcentaje".$nl."' type='number' class='form-control col-md-4 ' placeholder='Porcentaje' readonly value='".$knorow['porcentaje']."'><button id='elim".$nl."' value='".$knorow['id']."' type='button' onclick='hide(".$nl.")' class='btn btn-danger col-md-1'>Eliminar</button></div>";
		$nl = $nl + 1;
	}
	echo "</div>
		  </div>
		  <button id='updateButton' type='button' class='btn btn-primary'>Actualizar</button>
		  <a href='index.php' class='btn btn-light' role='button' aria-disabled='true'>Cancelar</a>
		  <input id='nInputs' type='hidden' value='".$nl."'>
		</form>";



?>