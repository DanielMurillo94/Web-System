$(document).ready(function() {

	$.ajax
	({url: "connection/modifyget.php",
	type: "POST",
	data: {"id":$("#idnumber").val()},
	async: false,
	complete: function(result){
    	$("#format").html(result.responseText);
    }
    });

});