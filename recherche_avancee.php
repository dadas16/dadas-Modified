<?php
	session_start();
	include("includes/connect.php");  
	connect();
	$sql="SELECT Origine, DateFin FROM  participant";
	$sqlFormation="SELECT nom FROM  module";
	$query=mysql_query($sql);
	$query1=mysql_query($sqlFormation);
	
	if(isset($_POST['submit']))
	{
	
		foreach($_POST as $key => $value)
		{
			${$key}=mysql_real_escape_string(strip_tags(trim($value)));
		}
		if($critere == "formation")
		{
			$champ="module";
			$table="demande";
		}	
		elseif($critere == "entreprise")
		{
			$champ="demandeur";
			$table="demande";
		}
		elseif($critere == "nombre")
		{
			$champ="idParticipant";
			$table="participant";
		}
		elseif($critere == "homme")
		{
			$champ="Genre";
			$value="Masculin";
			$table="participant";
		}
		else
		{
			$champ="Genre";
			$value="Feminin";
			$table="participant";
		}
		
		
		
		if($critere == "formation" or $critere =="entreprise" )
		{
			$requ="SELECT distinct ".$champ." FROM ".$table;
		
			//echo $requ;exit;
		
				$query=mysql_query($requ);
				$tableau=array();
				while($array=mysql_fetch_assoc($query))
				{
					foreach($array as $key => $value)
					{
						array_push($tableau,"$value");
					}
				}	
				//echo"<pre>";print_r($tableau);echo"</pre>";exit;
				$number=0;
				$min=$max=0;
				foreach($tableau as $value)
				{
					$requ1="SELECT count(*) as occurence FROM ".$table. " WHERE ".$champ." ='".$value."'";
					//echo $requ1." ";//exit;
					$queryCount=mysql_query($requ1);
					$num_rows=mysql_fetch_assoc($queryCount);
					$occurence=$num_rows['occurence'];
					//echo $occurence."<br/>";
					if($occurence > $max)	
					{
						$min=$occurence;
						$max=$occurence;
						$ref=$value;
					}
					if($occurence<$min)
					{
						$min=$occurence;
					}
					//echo $value."  a comme valeur maximale =".$max."<br/>";
				}
			//echo $min."<br/>";
		}
		else{
				if($critere =='nombre' )
				{
					$requ="SELECT count(*)  as occurence FROM ".$table;
					//$requ1="SELECT count(*) as occurence FROM ".$table. " WHERE ".$champ." ='".$value."'";
				}
				else
				{
					//$requ="SELECT ".$champ." FROM ".$table;
					$requ="SELECT count(*) as occurence FROM ".$table. " WHERE ".$champ." ='".$value."'";
					//echo $requ;exit;
				}
				$query1=mysql_query($requ);
				$num_rows1=mysql_fetch_assoc($query1);
				$occurence1=$num_rows1['occurence'];
				//echo $occurence;exit;
			}
				
	}	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>ENA</title>
<link rel="stylesheet" type="text/css" href="style.css" />

	<link href="../pagination/css/pagination.css" rel="stylesheet" type="text/css" />
	<!--<link href="css/grey.css" rel="stylesheet" type="text/css" />-->
	<link href="../pagination/css/B_blue.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
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
    
    <div class="right_header">Welcome Admin  | <a href="login.php" class="logout">Logout</a></div>
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
                <h3>User help desk</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h4>Important notice</h4>
                <img src="images/notice.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h5>Download photos</h5>
                <img src="images/photo.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>  
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>To do List</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                 <li>Lorem ipsum dolor sit ametconsectetur <strong>adipisicing</strong> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                  <li>Lorem ipsum dolor sit amet, consectetur <a href="#">adipisicing</a> elit.</li>
                   <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                </ul>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
              
    
    </div>  

    
    <div class="right_content">

<div class="form">
         <form method="post" action="" class="niceform">
						<fieldset>
							
									
								<table id="demand">
									

									
									<dl>
										<dt>	
											<label>Rechercher par :</label><br/>
										</dt>
										<dd> 
						<select id='critere' name='critere'>	
						<option value='formation'>Module le plus demand�</option>
						<option value='entreprise'>Entreprise ayant plus de formations</option>
						<option value='nombre'>Nombre de personnes form�es</option>
						<option value='homme'>Nombre d'hommes form�s</option>
						<option value='femme'>Nombre de femmes form�es</option>
					</select>		
					</dd>										</dl>
										<tr>

										<td>
											<input type="submit"  name="submit" id="Rechercher" value="Rechercher"/>
										</td>
										
									</tr>
								</table>
							</fieldset>
						</form>
        
		<div>
		<?php
			if($queryCount)
			{
				if($critere == "formation")
					echo"Le module le plus demand� est ".$ref." avec un nombre de fois de =".$max."  '"	;

				else	
					echo"L'entreprise qui a demand� le plus de formation est".$ref." avec un nombre de fois de =".$max."  '"	;

			}
			if($query1)
			{
				if($critere == "nombre")
				{
				echo"Le nombre total des personnes form�es dans tous les modules est ".$occurence1	;

				}
				elseif($critere == "homme")
				{
				echo"Le nombre d'hommes form�s dans tous les modules est ".$occurence1	;

				}
				elseif($critere == "femme")
				{
				echo"Le nombre de femmes form�es dans tous les modules est ".$occurence1;

				}
			}
		?>
     </div>
		
		
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