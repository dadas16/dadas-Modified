$("button#submit").click(	function(){

	if(	$("#username").val() == "" || $("#password").val() == "" )
	  $("div#eror").html("please enter username");
	else
	  $.post( $("#form_wrapper").attr("action"),
	          $("#form_wrapper").serializeArray(),
              function(data)	{
			   $("div#eror").html(data);
			  }); 	
	  $("#form_wrapper").submit(fuction(){
	     return false;
	  } ); 		  

});