<html>
<head>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			$('#statut').change(function(){
				var test=$(this).val();
				alert(test);
				$('#nom').val()m
			});
		});
	</script>
</head>
<body>



<FORM METHOD="POST" ACTION="" >
<INPUT NAME="idform" TYPE=hidden VALUE=""/>
<p> Nom : <INPUT NAME="nom" id="nom" TYPE=text VALUE=""/>
<p>Statut:
<SELECT NAME="statut" id="statut">
	<OPTION VALUE="1" >celibataire</option>
	<OPTION VALUE="2" >marie</option>
</SELECT>

</FORM>
</body>
</html>