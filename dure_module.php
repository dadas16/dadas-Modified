<?php
	
	if(isset($_POST['module1']))
	{
		$module1=$_POST['module1'];
		$sql="SELECT dure FROM module WHERE nom='".$module1."'";
		$query-mysql_query($sql);
		$res=mysql_fetch_assoc($query);
		echo $res;
	}

?>