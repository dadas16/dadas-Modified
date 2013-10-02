<?php
	include("includes/connect.php"); 
	connect();
	
	if(isset($_POST['module1']))
	{
		$module1=$_POST['module1'];
		$sql="SELECT distinct dure FROM module WHERE nom='".$module1."'";//echo $sql;exit;	
		$query = mysql_query($sql);
		$res = mysql_fetch_assoc($query);
		$dure= $res['dure'];
		echo "$dure";
	}

?>