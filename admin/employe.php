 <?php
	//session_start();
	//if($_SESSION['usertype']!='responsable'){
		//header("location:login3.php");
//	}
	include("includes/connect.php");  
	connect();
	$message="";
	if (array_key_exists ("submit",$_POST)){ 	
		foreach($_POST as $key=>$value){
					${$key}=mysql_real_escape_string(strip_tags(trim($value)));
		}

			if(empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['fonction']) OR empty($_POST['statut'])){
						$message.= "Attention! Un ou plusieurs Champs du formulaire sont Vide. Veuillez le(s) Remplir!";
			}elseif(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['fonction']) and !empty($_POST['statut'])){
			
			
			if(!(preg_match('#[[:alpha:]][[:alpha:][:space:]�����]{0,33}[[:alpha:]�����]#',$_POST['nom']))) 
					{
					
					$message.= "Vous avez Saisi un nombre pour le nom de l'employ�!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['prenom']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le champ du pr�nom!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['fonction']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le champ de la fonction!<br/>";
					}
						
						if($message=="")
						{
			
						$insert=mysql_query("INSERT INTO employe VALUES ('null','$nom','$prenom','$fonction','$statut')") or die(mysql_error());
						
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
    
    <div class="right_header">Bienvenue Directeur  | <a href="login.php" class="logout">Se d�connecter</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a class="current" href="index.php">Accueil</a></li>
					 
                        
						<li><a href="">G�rer Catalogue<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="module.php" title="">Cr�er module</a></li>
                                <li><a href="formation.php" title="">Liste des Modules</a></li>
                              </ul>
					<li><a href="employe.php">Cr�er un employ�<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                     <ul>
                                <li><a href="lis.php" title="">Liste des Employ�s</a></li>
                                </ul>
 
                    </ul>
                                       <!--[if lte IE 6]><table><tr><td><![endif]-->
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                       
                    </div> 
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
                     
            
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>Aide</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Veuillez survoller les diff�rents menus et les sous menus pour de plus emples utilisations
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
				<li>Cr�er une <strong> formation</strong> .</li>
                <li>Voir la liste des formations disponibles.</li>
                  <li>Cr�er un <strong>Employ�</strong> .</li>
                  <li>Voir la liste des employ�s .</li>
                   
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
     <div >
	 
       <?php
										if(!empty($messag)){
											echo "<span style='color:red; font-size:10pt;'>$messag</span>";
										}
										
										$categorie=(isset($_POST['categorie'])?$_POST['categorie']:'');
									$module=(isset($_POST['module'])?$_POST['module']:'');	
									$code=(isset($_POST['code'])?$_POST['code']:'');
									$dure=(isset($_POST['dure'])?$_POST['dure']:'');
									$date=(isset($_POST['date'])?$_POST['date']:'');

																		?>
     </div> 
          
     <h2>Formulaire de cr�ation d'un employ�</h2>
     
         <div class="form">
         <form method="post" action="" class="niceform">
						<fieldset>
							
									
								<table id="demand">
									<dl>
											<dt>
											<label>Nom : </label>
										</dt>
										<dd>
											<input type="text" name="nom" size="54" class="alpha" maxlength="256" value="<?php echo $categorie;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>
											<label>Pr�nom : </label>
										</dt>
										<dd>
											<input type="text" name="prenom" class="alpha" size="54" maxlength="256" value=" <?php echo $module;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Fonction:</label>
										</dt>

										<dd>
											<input type="text" name="fonction" class="alphanumeric" size="54" maxlength="256" value=" <?php echo $code;?>" required/>
										</dd>
									

									
									<dl>
										<dt>	
											<label>Statut :</label>
										</dt>
										<dd> <select name="statut" size="1" maxlength="256" value="<?php echo $statut;?>"required >
												<option>
												<option>Passif
												<option> Actif
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
    	<div class="left_footer">&copy;copyright  "Audace and  Jean-Marie" 2012 - <?php echo $currentYear;?>, tous droits r�serv�s </div>
    	<!--<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>-->
    
    </div>
	

</div>		
</body>
</html>