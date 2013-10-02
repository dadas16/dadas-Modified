


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
    
    		<div class="sidebar_search">
            <form method="GET" action="search_results.php" >
			
			<input type="text" name="search" class="search_input"  />
            <input type="submit" name="recherche"  />
			
			
            </form>            
            </div>
    
            
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
        
        	
<?php
    
$button = $_GET ['submit'];
$search = $_GET ['search']; 
  
if(strlen($search)<=1)
echo "Recherche trop courte";
else{
echo "Vous avez recherch� pour <b>$search</b> <hr size='1'></br>";


define("mysql_host_name","localhost");  
define("mysql_username","root");  
define("mysql_password","");  
define("database_name","fcontinue"); 
define("database_table_name","participant"); 

mysql_connect(mysql_host_name,mysql_username,mysql_password);
mysql_select_db(database_name);
    
$search_exploded = explode (" ", $search);    
foreach($search_exploded as $search_each)
{
/*$x++;
if($x==1)
$construct .= " nom LIKE '%$search_each%'";
elseif($x==1)
$construct .="AND nom LIKE '%$search_each%'";
elseif($x==1)
$code .= " code LIKE '%$search_each%'";
else
$code .="AND  code '%$search_each%'";
   */ 
}
  
$constructs ="SELECT * FROM ".database_table_name." WHERE nom LIKE '%$search_each%' OR code LIKE '%$search_each%' OR prenom LIKE '%$search_each%' OR origine LIKE '%$search_each%' ";
//echo $constructs;exit;
$run = mysql_query($constructs);

$foundnum = mysql_num_rows($run);
 // echo   $foundnum;exit;
if ($foundnum==0)
 
echo "D�sol�, il n'y a pas de r�sultat pour <b> $search </b>. </Br> </br> 1.
�  		 S'il vous pla�t v�rifier votre orthographe";
 
else
{ 
  
echo "$foundnum r�sultat(s) trouv�(s) !<p>";
  
$per_page = 8;
$start = $_GET['start'];
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$requete="SELECT * FROM ". database_table_name." WHERE nom LIKE '%$search_each%' OR code LIKE '%$search_each%' OR prenom LIKE '%$search_each%' OR origine LIKE '%$search_each%'  LIMIT $start, $per_page";
//echo $requete;exit;
$getquery = mysql_query($requete);
				
				echo "
				<table id=\"rounded-corner\" summary=\"2007 Major IT Companies' Profit\">
 							
   <thead>
    	<tr>
        	<th scope=\"col\" class=\"rounded-company\"></th>
			<th scope=\"col\" class=\"rounded\">N de S�rie</th>
            <th scope=\"col\" class=\"rounded\">CNI</th>
            <th scope=\"col\" class=\"rounded\">Nom</th>
            <th scope=\"col\" class=\"rounded\">Pr�nom</th>
			<th scope=\"col\" class=\"rounded\">Genre</th>
            <th scope=\"col\" class=\"rounded\">Origine</th>
            <th scope=\"col\" class=\"rounded\">code</th>
			<th scope=\"col\" class=\"rounded-q4\" colspan=\"3\" align=\"center\">Extras</th>
        
		</thead>";
	
				
				
  
				while($runrows = mysql_fetch_assoc($getquery))
				{
													$id=$runrows['idParticipant'];
													$cni=$runrows['CNI'];
													$nom=ucfirst($runrows['Nom']);
													$prenom=ucfirst($runrows['Prenom']);
													$mobile=ucfirst($runrows['code']);
													$genre=ucfirst($runrows['Genre']);
													$origine=ucfirst($runrows['Origine']);
													
					
					echo "
		

		<tbody>
		
 
    	<tr id=".$id.">
		
        	<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$id\" />
			</td><td>$id</td>
			<td>$cni</td>
			<td>$nom</td>
			<td>$prenom</td>
			<td>$genre</td>
			<td>$origine</td>
			<td>$mobile</td>
			
            <td><a href='modifier_participant.php?id=".$id."'><img src=\"images/user_edit.png\" alt=\"\" title=\"Modifier\" border=\"0\" /></a></td>
			
            
            <td id=".$id."><input type='hidden' class='supprimer' value=".$id." /><a href=\"#\" class=\"ask\"><img src=\"images/trash.png\" alt=\"\" title=\"Supprimer\" border=\"0\" /></a></td>
      
		</tr><br/>
		</tbody>
		";
				
		

		}
		echo"</tr></table>";
  }


	}
	
  

//Pagination Starts
echo "<center>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
//previous button
if (!($start<=0)) 
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$prev'>Prev</a> ";    
          
//pages 
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
}  
$i = $i + $per_page;                 
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
{
//close to beginning; only hide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))        
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
} 
$i = $i + $per_page;                                       
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=0'>1</a> ";
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$per_page'>2</a> .... ";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
}   
$i = $i + $per_page;                
}
                                  
}
//close to end; only hide early pages
else
{
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=0'>1</a> ";
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";   
} 
$i = $i + $per_page;              
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
echo " <a href='searchP.php?search=$search&submit=Search+source+code&start=$next'>Next</a> ";    
}   
echo "</center>";
 
 
?>
 <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong><input name="supprimerb" type="submit" id="supprimerb" onclick="return(confirm('Voulez-vous vraiment supprimer ce(s)demande(s)?'));" value="SUPPRIMER TOUT"></strong><span class="bt_red_r"></span></a> 
    
	<?php
if(isset($_POST['checkbox'])){

foreach ($_POST["checkbox"] as $index =>$val) {

  $str_requete = "DELETE FROM demande WHERE idDemande='$val'";
$result = mysql_query($str_requete) or die(mysql_error());
  }
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=search.php\">";

}

}


?>

	
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