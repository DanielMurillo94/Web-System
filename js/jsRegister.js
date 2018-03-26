$(document).ready(function() {
	var nl = 0;
	$("#registerButton").click(function(){
		var nombre = $("#inNombre").val();
		var edad = $("#inEdad").val();
		var direccion = $("#inDireccion").val();
		var estado = $("#inEstado").val();
		var fechaNac = $("#inFechaNac").val();
		var telefono = $("#inTelefono").val();
		var puesto = $("#inPuesto").val();
		var salario = $("#inSalario").val();
		var lenguajes = [];
		var porcentajes = [];
		for (i = 0; i < nl; i++) {
 		   lenguajes.push($("#inLenguaje"+i).val());
 		   porcentajes.push($("#inPorcentaje"+i).val());
		}
		console.log(lenguajes);
		console.log(porcentajes);
		var parametros = {
		                "nombre" : nombre,
		                "edad" : edad,
		                "direccion" : direccion,
		                "estado" : estado,
		                "fechaNac" : fechaNac,
		                "telefono" : telefono,
		                "puesto" : puesto,
		                "salario" : salario,
		                "lenguajes" : lenguajes,
		                "porcentajes" : porcentajes
	        		};
	    $.ajax
	    	({url: "connection/create.php",
	    	type: "POST",
	    	data: parametros,
	    	complete: function(result){
	        	$("#div1").html(result.responseText);
	        	//location.href = "index.php";
	        }

	    });
	});

	$("#addButton").click(function(){
		if($("#inLenguaje").val() != "" && $("#inPorcentaje").val() != ""){
			var nht = "<div class='row justify-content-around'><input type='text' class='form-control col-md-4' id='inLenguaje"+nl+"' placeholder='lenguaje' readonly value='"+$("#inLenguaje").val()+"'><input type='number' class='form-control col-md-4 ' id='inPorcentaje"+nl+"' placeholder='Porcentaje' readonly value='"+$("#inPorcentaje").val()+"'><button id='addButton' type='button' class='btn btn-danger col-md-1'>Eliminar</button></div>";
			nl = nl + 1;
			$("#inlanguages").html($("#inlanguages").html()+nht);
		}
	});
});