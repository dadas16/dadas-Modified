<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 />
<title>ENA</title>
 </head>
 <BODY .... onBlur="self.close();">

<input type="button" value="Imprimer" onclick="window.print()">
						<table width=100% border=1>
						<tr><td rowspan=3><img src="images/right.jpg" width=100% height=620></td><td><img src="images/right.jpg" width=100% height=10></td><td rowspan=3><img src="images/right.jpg" width=100% height=620></td></tr>
						<tr><td>
					<div align ="center"><h1><font color="green"><B>REPUBLIQUE DU BURUNDI</B></font></h1> <br/>
					<img src="images/logo.gif" width=200 height=100><br/>
					<h1><font color="black"><B>CERTIFICAT</B></font></h1> <br/>
					<font color="black"><B>L'Ecole Nationale d'Administration atteste que</B></font> <br/>




					</div>

					<BR/><BR/>
					 <font size="5">Mr,Mme,Mlle <?echo"<b>". $ligne['Nom']." ".$Nom_participant." ".$Prenom."</b>";?> a participé à la formation sur<b> <? echo $nom_module;?></b> d'un volume de <b> <? echo $dure ;?>H</b> qui a lieu à Bujumbura du <?echo $datefrDebut;?> au  <?echo $datefrFin;?> <br/>

					 En foi de quoi nous signons ce certificat muni du cachet de l'Ecole, pour faire valoir ce que de droit.<br/>
					 
																					 Délivré à Bujumbura , le  <?   echo "<b>". date('d /m /Y')."</b>";
					?><br/>
					 
					</font>

					 
					<table width=100%>
					<tr><td><BR/>Directeur Adjoint Chargé de la FC</td><td align="right">Directeur de l'ENA<br/></td></tr>

					<tr><td>


					<? $sql2 ="SELECT * from employe where (fonction = 'Directeur Ajoint') and (statut = 'Actif')";
					$resultat = mysql_query($sql2);
					while($data=mysql_fetch_array($resultat)){
															echo'<STRONG>'. $data['Nom_employe'].' '.$data['Prenom_employe'].'</STRONG>';	
					}

					?>






					</td><td align="right">
					<? $sql2 ="SELECT * from employe where (fonction = 'Directeur') and (statut = 'Actif')";
					$resultat = mysql_query($sql2);
					while($data=mysql_fetch_array($resultat)){
															echo'<STRONG>'. $data['Nom_employe'].' '.$data['Prenom_employe'].'</STRONG>';	
					}

					?>

					
					</td>
					
					</tr>


					</table>
					
					<table><tr><td>.<br><br></td></tr></table>
					
					
					</td></tr>
					<tr><td><img src="images/right.jpg"  width=100% height=10></td> </tr>

					</table>

					
</body>
</html>					
					