<?php
		include_once('db.php');
		$username = mysql_real_escape_string( $_POST["username"]);
		$password = mysql_real_escape_string(md5( $_POST["password"]));
		
		if(empty($username)|| empty($password) )
		 echo"username and password Mandatory-from php";
		else
		{
		$sql = "SELECT count(*) from utilisateur where(username='$username' and password='$password')";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		
		if( $row[0]>0)
			echo "Login successful";
		else
			echo"Failed to Login ";
		}	
?>