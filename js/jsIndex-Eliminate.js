function eliminar(_id){
	var r = confirm("¿Estás seguro de que quieres eliminar este registro?");
    if (r == true) {
        $.ajax
    	({url: "connection/Eliminate.php",
    	type: "POST",
    	data: {"id":_id},
    	complete: function(result){
        	location.reload();
        }
    });
    } else {
        
    }
}