<!DOCTYPE html>
<html>
<head>
  <title>Registrar empleado</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--<link rel="stylesheet" type="text/css" href="css/iconic-bootstrap.css">-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--<script src="js/jQuery-3.1.1.min.js" type="text/javascript"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/jsRegister.js" type="text/javascript"></script>
</head>
<body>
  <div><h1 class="liActive">Registrar empleado</h1><
  <div class="container">
  <form>
  <h3>Datos Generales</h3>
  <hr>
  <div class="form-group">
    <label for="inNombre">Nombre</label>
    <input type="text" class="form-control" id="inNombre" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="inEdad">Edad</label>
    <input type="number" class="form-control" id="inEdad" placeholder="Edad">
  </div>
  <div class="form-group">
    <label for="inDireccion">Direccion</label>
    <input type="text" class="form-control" id="inDireccion" placeholder="Dirección">
  </div>
  <div class="form-group">
    <label for="inEstado">Estado</label>
    <select class="form-control" id="inEstado">
      <option value="1">Aguascalientes</option>
      <option value="2">Baja California</option>
      <option value="3">Baja California Sur</option>
      <option value="4">Campeche</option>
      <option value="5">Chiapas</option>
      <option value="6">Chihuahua</option>
      <option value="7">Ciudad de México</option>
      <option value="8">Coahuila</option>
      <option value="9">Colima</option>
      <option value="10">Durango</option>
      <option value="11">Guanajuato</option>
      <option value="12">Guerrero</option>
      <option value="13">Hidalgo</option>
      <option value="14">Jalisco</option>
      <option value="15">México</option>
      <option value="16">Michoacán</option>
      <option value="17">Morelos</option>
      <option value="18">Nayarit</option>
      <option value="19">Nuevo León</option>
      <option value="2">Oaxaca</option>
      <option value="21">Puebla</option>
      <option value="22">Querétaro</option>
      <option value="23">Quintana Roo</option>
      <option value="24">San Luis Potosí</option>
      <option value="25">Sinaloa</option>
      <option value="26">Sonora</option>
      <option value="27">Tabasco</option>
      <option value="28">Tamaulipas</option>
      <option value="29">Tlaxcala</option>
      <option value="30">Veracruz</option>
      <option value="31">Yucatán</option>
      <option value="32">Zacatecas</option>
    </select>
  </div>
  <div class="form-group">
    <label for="inFechaNac">Fecha de nacimiento</label>
    <input type="Date" class="form-control" id="inFechaNac" placeholder="Fecha de nacimiento">
  </div>
  <div class="form-group">
    <label for="inTelefono">Teléfono</label>
    <input type="text" class="form-control" id="inTelefono" placeholder="Teléfono">
  </div>
  <h3>Datos Económicos</h3>
  <hr>
   <div class="form-group">
    <label for="inPuesto">Puesto</label>
    <input type="text" class="form-control" id="inPuesto" placeholder="Puesto">
  </div>
   <div class="form-group">
    <label for="inSalario">Salario</label>
    <input type="number" class="form-control" id="inSalario" placeholder="Salario">
  </div>
  <div class="form-group">
  <h3>Conocimiento</h3>
  <hr>
    <div class="row justify-content-around">
      <input type="text" class="form-control col-md-4" id="inLenguaje" placeholder="lenguaje">
      <input type="number" class="form-control col-md-4 " id="inPorcentaje" placeholder="Porcentaje">
      <button id="addButton" type="button" class="btn btn-primary col-md-1">Agregar</button>
      <input type="hidden" id="nLenguajes" val = "0">
    </div>
    <div id = "inlanguages">
      
      
    </div>
  </div>
  <button id="registerButton" type="button" class="btn btn-primary">Registrar</button>
</form>
</div>
  <div id="div1" class="col-md-12"></div>
</body>
</html>