<?php
	session_start();
		include("includes/connect.php");//connection au serveur et sélection de la base de données:
		
		connect();
		$today = date('Y-m-d');
		$id=$_GET["id"] ;//récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  
		$sql="SELECT * FROM demande where idDemande = ".$id;
		//echo $sql;exit;
		$query = mysql_query($sql);//requête SQL:
		
		
		if(mysql_num_rows($query) == 0)
			{
			$message=" aucun enregistrement";
			}
			
		while($array=mysql_fetch_assoc($query))
		{
				//echo"<pre>";print_r($array);echo"</pre>";exit;
				$demandeur=$array['demandeur'];
				$module=$array['module'];
				$effectif=$array['effectif'];
				$dure=$array['dure'];
				$benefit=$array['benefit'];
				$dateprob=$array['dateprob'];
				$contact=$array['contact'];
				$statut=$array['statut'];
				
				include("includes/dateformat.inc.php");
				$date=dateformat($dateprob);
				//echo $date;exit;
		}
		$message="";
		if(array_key_exists('submit',$_POST))
		{		
			//echo"<pre>";print_r($_POST);echo"</pre>";exit;
			foreach($_POST as $key=>$value)
			{
				${$key}=mysql_real_escape_string(strip_tags(trim($value)));
			}
			/*echo"<pre>";
			print_r($_POST);
			echo"</pre>",exit; */
			if(empty($demandeur1) OR empty($module1) OR empty($effectif1) OR empty($dure1) OR empty($benefit1) OR empty($dateprob1) OR empty($contact1) OR empty($statut1))
			{
				$message.="Tous les champs vides doivent etre remplis! \n";
								
			}
			elseif(!empty($demandeur1) OR !empty($module1) OR !empty($effectif1) OR !empty($dure1) OR !empty($benefit1) OR !empty($dateprob1) OR !empty($contact1) OR !empty($statut1))
			{	
					
					if($demandeur == $demandeur1 && $module == $module1 && $effectif == $effectif1 && $dure==$dure1 && $benefit == $benefit1 && $dateprob == $dateprob1 && $contact == $contact1 && $statut==$statut1)
					{
						$message.="Aucune modifiaction n'a été effectuée!";
					}
					
					if(!(preg_match('#[a-zA-Z]#',$_POST['demandeur1']))) 
					{
					
					$message.= "vous avez saisi un nombre pour demandeur!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['module1']))) 
					{
					
					$message.= "vous avez saisi un nombre pour module demandé!<br/>";
					}			
			if(!(preg_match('#[0-9]#',$_POST['effectif1']))) 
					{
					
					$message.= "vous avez saisi un caractère pour l effectif!<br/>";
					}
			if(!(preg_match('#[0-9]#',$_POST['dure1'])) )
					{
					
					$message.= "vous avez saisi un caractère pour la durée!<br/>";
					}

			
			if(!(preg_match('#[a-zA-Z]#',$_POST['benefit1']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le beneficiaire!<br/>";
					}
					
				//CHECK DATE 
					if ($dateprob1 < $today)
					{ 
						$message.=" La date ne peut pas être antérieure à celle d'aujourd'hui";
					}	


							if($message=="")
							{
					
								$insert="UPDATE demande SET  demandeur='$demandeur1',module='$module1',effectif='$effectif1',dure='$dure1',benefit='$benefit1',dateprob='$dateprob1',contact='$contact1',statut='$statut1' WHERE idDemande='$id'";
								}
								if($insert){
									$mess.="Félicitations! Enregistrement Réussi";
									unset($_POST);
									header("list.php");
							}else{
								$messag.="Echec d'enregistrement. Veuillez réessayer !";
							}

					}			
					

}
		
?>						




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html;charset=iso-8859-1"/>
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
                        <li><a href="demande.php" title="">Inscrire Demande</a></li>
                        <li><a href="list.php" title="">Traiter Demande</a></li>
                        </ul>
                        </li>
                    
                    <li><a href="#">Participant<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="participant.php" title="">Inscrire Participant</a></li>
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
											echo "<span style='color:red; font-size:10pt;'>$mess</span>";
										}
									?>

     </div>
     <div>
	 
<?php
										if(!empty($messag)){
											echo "<span style='color:red; font-size:10pt;'>$messag</span>";
										}
										
										
									
?>
     </div> 
       
           
     <h2>Formulaire de traitement d'une demande de Formation</h2>
     
         <div class="form">
         <form method="post" action="" class="niceform">
			<fieldset>
												
			<table id="demand">
				<dl>
					<dt>
						<label>Demandeur d'action : </label>
					</dt>
					<dd>
						<input type="text" name="demandeur1" size="54" class="alpha" maxlength="256" value="<?php echo $demandeur;?>" required />
					</dd>
				</dl>
				<dl>
					<dt>
						<label>Module demandé : </label>
					</dt>
					<dd>
						<input type="text" name="module1" class="alpha" size="54" maxlength="256" value=" <?php echo $module;?>" required />
					</dd>
				</dl>
				<dl>
					<dt>	
						<label>Effectif :</label>
					</dt>

					<dd>
						<input type="text" name="effectif1" class="numeric" size="54" maxlength="256" value=" <?php echo $effectif;?>" required/>
					</dd>
				</dl>
				<dl>
					<dt>	
						<label> Durée(Heures):</label>
					</dt>
					<dd>
						<input type="text" name="dure1" class="numeric" size="54" maxlength="256" value=" <?php echo $dure;?>" required/>
					</dd>
				</dl>
				<dl>
					<dt>	
						<label>Bénéficiaires :</label>
					</dt>

					<dd>
						<input type="text" name="benefit1" class="alpha" size="54" maxlength="256" value=" <?php echo $benefit;?>" required/>
					</dd>
				</dl>
				<dl>
					<dt>	
						<label>Date Probable :</label>
					</dt>

					<dd>
						<input type="date" name="dateprob1" size="54" maxlength="256"  value="<?php echo $date;?>" required/>
					</dd>
				</dl>
				<dl>
					<dt>	
						<label>Contact Client :</label>
					</dt>

					<dd>
						<input type="text" name="contact1" size="54" maxlength="256" class="numeric" value=" <?php echo $contact;?>" required/>
					</dd>
				</dl>

									
					<dl>
						<dt>	
							<label>Statut :</label>
						</dt>
						<dd> 
							<select name="statut1" maxlength="256" required >
								<option <?php if(isset($statut) and ($statut=="A Refaire")){echo "selected=\"selected\" ";} ?>>A Refaire</option>
								<option <?php if(isset($statut) and ($statut=="A traiter")){echo "selected=\"selected\" ";} ?>>A traiter</option>
								<option <?php if(isset($statut) and ($statut=="Acceptée")){echo "selected=\"selected\" ";} ?>> Acceptée</option>
								<option <?php if(isset($statut) and ($statut=="Refusée")){echo "selected=\"selected\" ";} ?>> Refusée</option>
							</select>
						</dd>
					</dl>
					<dl>

					<dt>
						
					</dt>
					<dd>
						<input type="submit"  name="submit" value="Sauvegarder"/>
					</dd>
					</dl>
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