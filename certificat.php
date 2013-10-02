<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>ENA</title>
 </head>
 <BODY .... onBlur="self.close();">
    <?
	$id=$_GET["id"] ;
	
	mysql_connect("127.0.0.1","root","");
		$db=mysql_select_db("fcontinue");
		mysql_query($db);
	include('includes/dateformat.inc.php');
		
 	
	 $sql="SELECT date,participantid,nomModul,nomFormateur,presence_mat_t1,presence_amidi_t1,somme_presence,idParticipant,CNI,Nom,Prenom,Genre,DateDebut,DateFin,code,note	 FROM sommepresence LEFT JOIN participant ON (participantid = idParticipant) and(nomModul=code) WHERE idParticipant='$id'";
	$execsele=mysql_query($sql);	
	while($ligne = mysql_fetch_object($execsele))
	{
		
		$nomModul = $ligne->nomModul;
		$Nom_participant = $ligne->Nom;
		$presence_mat_t1 = $ligne->presence_mat_t1;
		$presence_amidi_t1 = $ligne->presence_amidi_t1;
		$somme_presence = $ligne->somme_presence;
		$idParticipant = $ligne->idParticipant;
		$Prenom = $ligne->Prenom;
		//$DateDebut = $ligne->DateDebut;
		$datefrDebut=dateformat($ligne->DateDebut);
		$datefrFin=dateformat($ligne->DateFin);
		
		//$DateFin = $ligne->DateFin;
		$code = $ligne->code;
		$note = $ligne->note;
	}
		
	$slql="SELECT * FROM module WHERE code ='$nomModul'"; 
	$execsele=mysql_query($slql);	
	while($ligne = mysql_fetch_object($execsele))
	{
		$id_Module  = $ligne->id_Module; 
		$categorie = $ligne->categorie;
		$nom_module = $ligne->nom;
		$code_module= $ligne->code;
		$dure= $ligne->dure;
	
	}
	$max=20;
	 $heure_minimal= $dure/4;
	 $heure_absence= $somme_presence * 4;
	$note_max= $note * 100/$max;
	$note_pourcentage=70;
	if (($heure_minimal < $heure_absence))
	{
			if (($note_max >= 70))
			{
			 include('fichier_certificat.php');
			 
			}else{
			
				include ('fichier_attestation.php');
			
				}
			
	
	
	}ELSE{
	
					if (($note>10))
					{
					
					include('fichier_certificat.php');
					
					
					} else {include ('fichier_attestation.php');}
		}
	
	?>
</body>
</html>