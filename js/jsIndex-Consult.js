$(document).ready(function() {
    $.ajax
    	({url: "connection/read.php",
    	type: "GET",
    	complete: function(result){
        	$("#wBody").html(result.responseText);
        }
    });
});