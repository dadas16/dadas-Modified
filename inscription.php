<?php
	session_start();
	//echo "<pre>";print_r($_SESSION);echo"</pre>";exit;
	if($_SESSION['usertype']!='responsable'){
		header("location:login.php");
	}
	include("includes/connect.php");  
	connect();
	$today = date('Y-m-d');
	// cr�e les listes des codes des modules
 $listeCodes = "";
 $sql = "SELECT * FROM module ORDER BY code;";
 $result = mysql_query($sql) or die(mysql_error());
 while($result && $row=mysql_fetch_array($result))
 {
         $selected = $row['code']==$code? " selected " : "";
         $listeCodes .= "<option value=\"".$row['code']."\" ".$selected." >".$row['code']."</option>";
 }
 
 // cr�e les listes des modules
 $listenoms = "";
 $sql1 = "SELECT * FROM participant ORDER BY CNI;";
 $result1 = mysql_query($sql1) or die(mysql_error());
 while($result1 && $row=mysql_fetch_array($result1))
 {
         $selected = $row['CNI']==$CNI? " selected " : "";
         $listecni .= "<option value=\"".$row['CNI']."\" ".$selected." >".$row['CNI']."</option>";
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

			if(empty($_POST['cni']) ){
						$message.= "Attention! Un ou plusieurs Champs du formulaire sont Vide. Veuillez le(s) Remplir!";
			}elseif(!empty($_POST['cni']) and !empty($_POST['date'])and !empty($_POST['date1']) and !empty($_POST['code'])){
			
			
			
			//CHECK DATE 
					if ($_POST['date'] < $today )
					{ 
						$message.=" La date de d�but ne peut pas �tre ant�rieure � celle d'aujourd'hui <br/>";
					}		
					if ($_POST['date1'] < $today )
					{ 
						$message.=" La date de Fin ne peut pas �tre ant�rieure � celle d'aujourd'hui <br/>";
					}		
					if ($_POST['date1'] < $_POST['date'] )
					{ 
						$message.=" La date de Fin ne peut pas �tre ant�rieure � celle du d�but";
					}		
			

					
			if(!(preg_match('#0[0-9]+/[0-9]{3,}\.[0-9]{2,4}#',$_POST['cni']))) 
					{
						$message.= "votre CNI n'est pas valide!<br/>";
						}
						
				if($message=="")
						{
			
						$insert=mysql_query("INSERT INTO inscription VALUES ('null','$cni','$code','$date','$date1','null')") or die(mysql_error());
						
							}
							if($insert){
									$mess.="F�licitations! Enregistrement R�ussi";
									unset($_POST);
									//header('location:liste.php');

							}else{
								$messag.="Echec d'enregistrement. Veuillez r�essayer !";
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
    
    <div class="right_header">Bienvenue Responsable A.P  | <a href="logout.php" class="logout">Se d�connecter</a></div>
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
                        <li><a href="participant.php" title="">Inscrire Participant</a></li>
                        <li><a href="liste.php" title="">Liste des Participants</a></li>
                        </ul>
                        </li>
                    
                     
                    
                        
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="#">G�rer pr�sence</a>
					<ul>
                        <li><a href="presence.php" title="">Inscrire Pr�sence</a></li>
						<li><a href="historique.php" title="">Historique des Pr�sence</a></li>
                        <li><a href="voirpresence.php" title="">V�rification Pr�sence</a></li>
                        </ul>
                        </li>                    
						<li><a href="#">G�n�rer Documents<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        
                    
						<li><a class="sub1" href="" title="">G�n�rer certificat/Attestation<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                 <li><a href="inscrire.php" title="">Inscrire Notes</a></li>
                                 <li><a href="voirnotes.php" title="">Voir Notes</a></li>
								 </ul>
                        <li><a href="recherche_avancee.php" title="">G�n�rer Rapport</a></li>
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
Veuillez survoller les diff�rents menus pour de plus emples utilisations
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
Veuillez fermer votre session de travail pour �viter que personne d'autre n'utilise votre compte en se d�connectant par le bouton se d�connecter en haut � droite
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
                    <li>La gestion des pr�sences.</li>
                     <li>La g�n�ration des documents.</li>
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
       
           
     <h2>Formulaire d'Inscription  d'un Participant � une Formation</h2>
     
         <div class="form">
				<form method="post" action="" class="niceform">
						<fieldset>
							
									
								<table id="demand">
									<dl>
										<dt>	
											<label>CNI :</label>
										</dt>

										<dd>
											<select name="cni" value="<?php echo $CNI; ?>" size="1" required/>
 <option value="" ></option>
 <?php echo $listecni; ?>
 </select>
										</dd>
									</dl>
	
									<dl>
										<dt>	
											<label>Code du Module :</label>
										</dt>

										<dd>
											<select name="code" value="<?php echo $code; ?>" size="1" required/>
 <option value="" ></option>
 <?php echo $listeCodes; ?>
 </select>
										</dd>
									</dl>

									<dl>
										<dt>	
											<label>Date d�but :</label>
										</dt>

										<dd>
											<input type="date" name="date" class="" size="54" maxlength="256" value=" <?php echo $date;?>" required/>
										</dd>
									</dl>

									<dl>
										<dt>	
											<label>Date Fin  :</label>
										</dt>

										<dd>
											<input type="date" name="date1" class="" size="54" maxlength="256" value=" <?php echo $date1;?>" required/>
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
    	<div class="left_footer">&copy;copyright  "Audace and  Jean-Marie" 2012 - <?php echo $currentYear;?>, tous droits r�serv�s </div>
    	<!--<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>-->
    
    </div>
	

</div>		
</body>
</html>