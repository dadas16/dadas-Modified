<?php
		include("includes/connect.php");//connection au serveur et s�lection de la base de donn�es:
		connect();
		//$id=$_GET["id"] ;//r�cup�ration de la variable d'URL,
		$id=$_POST["idToDelete"] ;//r�cup�ration de la variable d'URL,
		//echo "$id";exit;
		//qui va nous permettre de savoir quel enregistrement supprimer
  
		$query = "DELETE FROM module WHERE id_Module = ".$id ;
  	    //echo "$query";exit;
			//ex�cution de la requ�te:
			$requete = mysql_query($query) ;
			//$execute=mysql_query($requete);
			$message="";
 
			//affichage des r�sultats, pour savoir si la suppression a march�e:
			if($requete)
			{
				$message.="F�licitations. La Suppression a r�ussi:";
				//echo $message;
				echo $id;
				//header('Location:Formation.php');
			}
			else
			{
				$message.="La suppression a �chou�e:";
				echo $message;
			}
	//;
  ?>	