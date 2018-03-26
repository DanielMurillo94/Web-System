$(document).ready(function() {

	var nl = $("#nInputs").val();

	$("#updateButton").click(function(){
		
		console.log(nl);
		var id = $("#idnumber").val();
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
		var idKnow = [];
		var action = [];
		for (i = 0; i < nl; i++) {
			idKnow.push($("#elim"+i).val());
 		   lenguajes.push($("#inLenguaje"+i).val());
 		   porcentajes.push($("#inPorcentaje"+i).val());
 		   if($("#elim"+i).attr("type") == "hidden"){
 		   		action.push("elim");
 		   }
 		   else if($("#elim"+i).val() != ""){
 		   		action.push("mod");
 		   }
 		   else
 		   		action.push("create");
		}
		console.log(lenguajes);
		console.log(porcentajes);
		console.log(idKnow);
		console.log(action);
		var parametros = {
						"id" : id,
		                "nombre" : nombre,
		                "edad" : edad,
		                "direccion" : direccion,
		                "estado" : estado,
		                "fechaNac" : fechaNac,
		                "telefono" : telefono,
		                "puesto" : puesto,
		                "salario" : salario,
		                "lenguajes" : lenguajes,
		                "porcentajes" : porcentajes,
		                "idKnow" : idKnow,
		                "action" : action
	        		};
	    console.log(parametros);
	    $.ajax
	    	({url: "connection/modify.php",
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
			var nht = "<div class='row justify-content-around' id = 'knowinputs"+nl+"'><input type='text' class='form-control col-md-4' id='inLenguaje"+nl.toString()+"' placeholder='lenguaje' readonly value='"+$("#inLenguaje").val()+"'><input type='number' class='form-control col-md-4 ' id='inPorcentaje"+nl.toString()+"' placeholder='Porcentaje' readonly value='"+$("#inPorcentaje").val()+"'><button id='elim"+nl+"' type='button' onclick='hide("+nl+")' class='btn btn-danger col-md-1'>Eliminar</button></div>";
			nl = Number(nl)+1;
			$("#inlanguages").html($("#inlanguages").html()+nht);
		}
	});
});

	function hide(number){
		console.log("apachurrado");
		var vlang = $("#inLenguaje"+number).val();
		var vporc = $("#inPorcentaje"+number).val();
		var velim = $("#elim"+number).val();
		console.log(vlang);
		console.log(vporc);
		console.log(velim);
		var nht = "<input type='hidden' class='form-control col-md-4' id='inLenguaje"+number.toString()+"' placeholder='lenguaje' value='"+vlang+"'><input type='hidden' class='form-control col-md-4 ' id='inPorcentaje"+number+"' placeholder='Porcentaje' readonly value='"+vporc+"'><input id='elim"+number+"' value = '"+velim+"' type='hidden' onclick='hide("+number+")' >";
		$("#knowinputs"+number).html(nht);
	}