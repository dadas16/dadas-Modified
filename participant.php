<?php
	session_start();
	//echo "<pre>";print_r($_SESSION);echo"</pre>";exit;
	if($_SESSION['usertype']!='responsable'){
		header("location:login.php");
	}
	include("includes/connect.php");  
	connect();
	$today = date('Y-m-d');
	// crée les listes des codes des modules
 $listeCodes = "";
 $sql = "SELECT * FROM module ORDER BY code;";
 $result = mysql_query($sql) or die(mysql_error());
 while($result && $row=mysql_fetch_array($result))
 {
         $selected = $row['code']==$code? " selected " : "";
         $listeCodes .= "<option value=\"".$row['code']."\" ".$selected." >".$row['code']."</option>";
 }
 
 // crée les listes des modules
 $listenoms = "";
 $sql1 = "SELECT * FROM module ORDER BY nom;";
 $result1 = mysql_query($sql) or die(mysql_error());
 while($result1 && $row=mysql_fetch_array($result1))
 {
         $selected = $row['nom']==$nom? " selected " : "";
         $listenoms .= "<option value=\"".$row['id_Module']."\" ".$selected." >".$row['nom']."</option>";
 }
$listID = "";
 $sql2 = "SELECT * FROM module ORDER BY id_Module;";
 $result2 = mysql_query($sql) or die(mysql_error());
 while($result1 && $row=mysql_fetch_array($result2))
 {
         $selected = $row['id_Module']==$id? " selected " : "";
         $listID .= "<option value=\"".$row['id_Module']."\" ".$selected." >".$row['id_Module']."</option>";
 }
	$message="";
	if (array_key_exists ("submit",$_POST)){ 	
		foreach($_POST as $key=>$value){
					${$key}=mysql_real_escape_string(strip_tags(trim($value)));
		}

			if(empty($_POST['cni']) OR empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['genre']) OR empty($_POST['mobile']) OR empty($_POST['origine'])){
						$message.= "Attention! Un ou plusieurs Champs du formulaire sont Vide. Veuillez le(s) Remplir!";
			}elseif(!empty($_POST['cni']) and !empty($_POST['nom'])  and !empty($_POST['genre']) and !empty($_POST['mobile']) and !empty($_POST['origine']) and !empty($_POST['prenom'])){
			
			
			if(!(preg_match('#[[:alpha:]][[:alpha:][:space:]éèçàù]{0,33}[[:alpha:]éèçàù]#',$_POST['prenom']))) 
					{
					
					$message.= "Vous avez Saisi un nombre pour votre prénom!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['nom']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le champ de votre prénom!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['genre']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le champ de votre genre!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['origine']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le champ de votre Origine!<br/>";
					}	

			/*CHECK DATE 
					if ($_POST['date'] < $today )
					{ 
						$message.=" La date de début ne peut pas être antérieure à celle d'aujourd'hui";
					}		
					if ($_POST['date1'] < $today )
					{ 
						$message.=" La date du début ne peut pas être antérieure à celle d'aujourd'hui";
					}		
					if ($_POST['date1'] < $_POST['date'] )
					{ 
						$message.=" La date de Fin ne peut pas être antérieure à celle du début";
					}		
			*/

					
			if((preg_match('#0[0-9]+/[0-9]{3,}\.[0-9]{2,4}#',$_POST['cni']))) 
					{
					
					// ON VERIFIE SI LE CNI EST DANS LA TABLE
					$sql  = "SELECT COUNT(*) AS nbr FROM participant WHERE CNI = '".$_POST['cni']."'";
					$res  = mysql_query($sql);
					$alors  = mysql_fetch_assoc($res);
         
					// UNE BOUCLE POUR INFORMER L'UTLISATEUR
					if(isset($_POST['cni'])){
					if(!($alors['nbr'] == 0)){
												$message.= "votre CNI existe déjà ds la base!<br/>";
											}
											}
					
					
					}else{
						$message.= "votre CNI n'est pas valide!<br/>";
						}
			if((preg_match('#7[1-9]([-. ]?[0-9]{2}){3}#',$_POST['mobile'])))
					{
					
					// ON VERIFIE SI LE TEL  EST DANS LA TABLE
					$sql  = "SELECT COUNT(*) AS nb FROM participant WHERE TelMob = '".$_POST['mobile']."'";
					$res  = mysql_query($sql);
					$alors  = mysql_fetch_assoc($res);
         
					// UNE BOUCLE POUR INFORMER L'UTLISATEUR
					if(isset($_POST['mobile'])){
												if(!($alors['nb'] == 0)){
												$message.= "Le téléphone que vous avez entré appartient à une autre personne!<br/>";
																	}
											}
					
					
					}else{
						$message.= "votre numéro de téléphone n'est pas valide!<br/>";
						}			
			
						if($message=="")
						{
			
						$insert=mysql_query("INSERT INTO participant VALUES ('null','$cni','$nom','$prenom','$origine','$mobile','$genre')") or die(mysql_error());
						
							}
							if($insert){
									$mess.="Félicitations! Enregistrement Réussi";
									unset($_POST);
									//header('location:liste.php');

							}else{
								$messag.="Echec d'enregistrement. Veuillez réessayer !";
							}
				}		
			}
	
mysql_close();
?>

<?php									
									$cni=(isset($_POST['cni'])?$_POST['cni']:'');
									$nom=(isset($_POST['nom'])?$_POST['nom']:'');	
									$prenom=(isset($_POST['prenom'])?$_POST['prenom']:'');
									$genre=(isset($_POST['genre'])?$_POST['genre']:'');
									$mobile=(isset($_POST['mobile'])?$_POST['mobile']:'');
									$origine=(isset($_POST['origine'])?$_POST['origine']:'');
									$date=(isset($_POST['date'])?$_POST['date']:'');
									$date1=(isset($_POST['date1'])?$_POST['date1']:'');
									$code=(isset($_POST['code'])?$_POST['code']:'');
									?>
    


 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENA</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript" src="alphanumeric.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Bienvenue Responsable A.P  | <a href="logout.php" class="logout">Se déconnecter</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                   <div class="menu">
                    <ul>
                    <li><a class="current" href="index.php">Accueil</a></li>
                    <li><a href="#">Demande<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
						<li><a href="formation.php" title="">Liste des formations</a></li>
						<li><a href="liste1.php" title="">Liste des formations encours</a></li>
                        <li><a href="demande.php" title="">Inscrire Demande</a></li>
                        <li><a href="list.php" title="">Traiter Demande</a></li>
                        </ul>
                        </li>
                    
                    <li><a href="#">Participant<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="participant.php" title="">Identification Participant</a></li>
                        <li><a href="inscription.php" title="">Inscrire Participant</a></li>
                        <li><a href="liste.php" title="">Liste des Participants</a></li>
                        </ul>
                        </li>
                    
                     
                    
                        
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="#">Gérer présence</a>
					<ul>
                        <li><a href="presence.php" title="">Inscrire Présence</a></li>
						<li><a href="historique.php" title="">Historique des Présence</a></li>
                        <li><a href="voirpresence.php" title="">Vérification Présence</a></li>
                        </ul>
                        </li>                    
						<li><a href="#">Générer Documents<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        
                    
						<li><a class="sub1" href="" title="">Générer certificat/Attestation<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                 <li><a href="inscrire.php" title="">Inscrire Notes</a></li>
                                 <li><a href="voirnotes.php" title="">Voir Notes</a></li>
								 </ul>
                        <li><a href="recherche_avancee.php" title="">Générer Rapport</a></li>
                        </ul>
                        </li>		 
					</li>
                    
                    </ul>
                    </div> 
                     
  
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		
                     
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>Aide</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Veuillez survoller les différents menus pour de plus emples utilisations
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h4>Remarque Importante</h4>
                <img src="images/notice.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Veuillez fermer votre session de travail pour éviter que personne d'autre n'utilise votre compte en se déconnectant par le bouton se déconnecter en haut à droite
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                
            </div>  
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>A faire</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li>Voir la liste des formations disponible.</li>
                 <li>Inscription d'une <strong>une demande</strong> .</li>
                  <li>Le Traitement des demandes .</li>
                   <li> L'inscription des participants</li>
                    <li>La gestion des présences.</li>
                     <li>La génération des documents.</li>
                </ul>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
              
    
    </div>  
    
    <div class="right_content">            
         <div >
        <?php
										if(!empty($message)){
											echo "<span style='color:red; font-size:10pt;'>$message</span>";
										}
									?>

     </div>
     <div >
       <?php
										if(!empty($mess)){
											echo "<span style='color:Green; font-size:10pt;'>$mess</span>";
										}
									?>

     </div>
     <div >
	 
       <?php
										if(!empty($messag)){
											echo "<span style='color:red; font-size:10pt;'>$messag</span>";
										}
										
										
																	
									?>
     </div> 
       
           
     <h2>Formulaire d'identification  d'un Participant</h2>
     
         <div class="form">
				<form method="post" action="" class="niceform">
						<fieldset>
							
									
								<table id="demand">
									<dl>
											<dt>
											<label>CNI : </label>
										</dt>
										<dd>
											<input type="text" name="cni" size="54" class="alphanumeric" maxlength="256" value="<?php echo $cni;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>
											<label>Nom : </label>
										</dt>
										<dd>
											<input type="text" name="nom" class="alpha" size="54" maxlength="256" value=" <?php echo $nom;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Prénom :</label>
										</dt>

										<dd>
											<input type="text" name="prenom" class="" size="54" maxlength="256" value=" <?php echo $prenom;?>" required/>
										</dd>
									</dl>
										
									</dl>
										<dl>
										<dt>	
											<label>Origine :</label>
										</dt>

										<dd>
											<input type="text" name="origine" class="alpha" size="54" maxlength="256" value=" <?php echo $origine;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Téléphone :</label>
										</dt>

										<dd>
											<input type="text" name="mobile" class="numeric" size="54" maxlength="256" value=" <?php echo $mobile;?>" required/>
										</dd>
									</dl>
									
										<dl>
										<dt>	
											<label>Genre :</label>
										</dt>
										<dd> <select name="genre" size="1" maxlength="256" value="<?php echo $genre;?>"required/ >
												<option>
												<option>Masculin
												<option>Féminin
												</select>
										</dd>
										</dl>
									
										<tr>

										<td>
											<input type="submit"  name="submit" value="Sauvegarder"/>
										</td>
										<td>
											<input type="reset"  name="reset" value="annuler"/>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>


         </div>  
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    <?php
	$time=time();
	$currentYear=date ('Y',$time);
?>
    	<div class="left_footer">&copy;copyright  "Audace and  Jean-Marie" 2012 - <?php echo $currentYear;?>, tous droits réservés </div>
    	<!--<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>-->
    
    </div>
	

</div>		
</body>
</html>