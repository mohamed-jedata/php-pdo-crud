$(document).ready(function(){
   
$('.updateInfo').click(function () { 

    var value = $(this).closest('tr').find(".editId").text();

    

	 var dataString = "edit_id="+value;
	$.ajax({
		type : "GET",
		url : "edit.php",
		data: dataString,
		success: function(result){
			$("#updateForm").html(result);
		}

	});



});


  }); 
