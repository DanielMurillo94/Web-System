<!DOCTYPE html>
<html>
<head>
  <title>Actualizar empleado</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--<link rel="stylesheet" type="text/css" href="css/iconic-bootstrap.css">-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--<script src="js/jQuery-3.1.1.min.js" type="text/javascript"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/jsUpdate-Get.js" type="text/javascript"></script>
  <script src="js/jsUpdate-Set.js" type="text/javascript"></script>
</head>
<body>
  <?php echo "<input type='hidden' id='idnumber' value='".$_GET['ide']."'>"; ?>
  <h1 class="liActive">Actualizar empleado</h1>
  <div id = "format" class="container"></div>
  <div id="div1" class="col-md-12"></div>
</body>
</html>