<?php
	session_start();
	//if($_SESSION['usertype']!='directeur'){
	//	header("location:admin/login1.php");
	//}
	
	include('includes/connect.php');
	connect();
	$message="";
	/*define("MAXSHOW",4);
	//Preparer une requete
	$requete="SELECT count(*) FROM demande order by idDemande ";
	$execute=mysql_query($requete);//execute the query
	$run=mysql_fetch_row($execute);
	$totals=$run[0];
	//print_r($run);exit;
	if($totals>0)
	{
		$page_courante=isset($_GET['page_courante'])?$_GET['page_courante']:0;
		//echo $page_courante;exit;
		$index_premiereligne=$page_courante*MAXSHOW;
		//echo $index_premiereligne;exit;
		$query="SELECT * FROM demande ORDER BY module ASC LIMIT $index_premiereligne,".MAXSHOW;
		//echo $query;exit;
		$resultat=mysql_query($query);
	}
		While($var=mysql_fetch_array('$run'));
		{
			$_SESSION['id']=$var['id'];
		}*/
		include_once ('../pagination/functionR.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 6;
    	$startpoint = ($page * $limit) - $limit;
        echo $startpoint;
        //to make pagination
        //$statement = "`records` where `active` = 1";
        $statement = "demande";
		
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    
    <div class="right_header">Bienvenue Responsable A.P  | <a href="login.php" class="logout">Se d�connecter</a></div>
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
    
    		
    </div>  

    
    <div class="right_content">            
        
    <h2>Liste des Demandes commen�ant par <?echo $rech?>  </h2> 
      <?php
if (isset($_POST["recherche"]))
{
$rech=$_POST["search"];



//$queryz=mysql_query("SELECT * FROM demande  where demandeur like  '$rech%' or module like '".$rech."' or effectif like '".$rech."' or dure like '".$rech."' or benefit like '".$rech."' or dateprob like '".$rech."' or statut like '".$rech."' ") or die (mysql_error());
    	//$total = mysql_num_rows($queryz);

//echo $total;

$sql="SELECT * FROM demande  where demandeur like  '$rech%' or module like '".$rech."' or effectif like '".$rech."' or dure like '".$rech."' or benefit like '".$rech."' or dateprob like '".$rech."' or statut like '".$rech."' LIMIT {$startpoint} , {$limit} ";

//echo $sql;exit;

$query=mysql_query($sql) or die (mysql_error());
$total = mysql_num_rows($query);
//echo $numres=mysql_num_rows($sql2);exit;
echo" 
							
<table id=\"rounded-corner\" summary=\"2007 Major IT Companies' Profit\">
 							
   <thead>
    	<tr>
        	<th scope=\"col\" class=\"rounded-company\"></th>
            <th scope=\"col\" class=\"rounded\">Demandeur D'Action</th>
            <th scope=\"col\" class=\"rounded\">Module Demand�</th>
            <th scope=\"col\" class=\"rounded\">Dur�e</th>
			<th scope=\"col\" class=\"rounded\">Effectif</th>
            <th scope=\"col\" class=\"rounded\">B�n�ficiaires</th>
            <th scope=\"col\" class=\"rounded\">Date Probable</th>
            <th scope=\"col\" class=\"rounded\">Contact Client</th>
			<th scope=\"col\" class=\"rounded-q4\" colspan=\"3\" align=\"center\">Extras</th>
        
		</thead>";
   
while($data=mysql_fetch_array($query))
{													$id=$data['idDemande'];
													$demandeur=$data['demandeur'];
													$module=ucfirst($data['module']);
													$effectif=ucfirst($data['effectif']);
													$dure=ucfirst($data['dure']);
													$benefit=ucfirst($data['benefit']);
													$dateprob=ucfirst($data['dateprob']);
													$contact=ucfirst($data['contact']);
	
												 
echo "
		

		<tbody>
		
 
    	<tr id=".$id.">
		
        	<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$id\" />
			</td><td>$demandeur</td>
			<td>$module</td>
			<td>$effectif</td>
			<td>$dure</td>
			<td>$benefit</td>
			<td>$dateprob</td>
			<td>$contact</td>
            <td><a href='traitement.php?id=".$id."'><img src=\"images/user_edit.png\" alt=\"\" title=\"Traitement\" border=\"0\" /></a></td>
			<td><a href='statut.php?id=".$id."'><img src=\"images/user_edit.png\" alt=\"\" title=\"Voir Statut\" border=\"0\" /></a></td>
            
            <td id=".$id."><input type='hidden' class='supprimer' value=".$id." /><a href=\"#\" class=\"ask\"><img src=\"images/trash.png\" alt=\"\" title=\"Supprimer\" border=\"0\" /></a></td>
      
		</tr><br/>
		</tbody>
		";
				
		

		}
		echo"</tr></table>";
}


?>      

    
    	
<!--<script>
	$(document).ready(function(){
		$('.yes').click(function(){
			var id_delete=$('.supprimer').val();
			alert(id_delete);exit;
			var mydata='idToDelete='+id_delete;
					
					alert(mydata);exit;
					
					jQuery.ajax({
						url:"delete_formation1.php",
						type:"POST",
						data:mydata,
						success:function(response){
							//alert(response);exit;
							//$('#response').html(response);
							var idDeleted=response;
								$('tr#'+idDeleted).fadeOut("slow");
							
						}
		})
	});
</script>-->
	<!--  <a href="demande.php" class="bt_green"><span class="bt_green_lft"></span><strong>Ajouter une Nouvelle</strong><span class="bt_green_r"></span></a>-->
   <!--  <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>-->
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong><input name="supprimerb" type="submit" id="supprimerb" onclick="return(confirm('Voulez-vous vraiment supprimer ce(s)demande(s)?'));" value="SUPPRIMER TOUT"></strong><span class="bt_red_r"></span></a> 
    	</ form>
		
		
		
		<?php
if(isset($_POST['checkbox'])){

foreach ($_POST["checkbox"] as $index =>$val) {

  $str_requete = "DELETE FROM demande WHERE idDemande='$val'";
$result = mysql_query($str_requete) or die(mysql_error());
  }
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=list.php\">";

}

}


?>

	<div class='pagination'>
		<?php
			echo pagination($query,$total,$per_page=6,$statement,$limit,$page);
		
		?>
	</div>

	<!--<div class="pagination">
			
		<span class="disabled"><< prev</span><span class="current">1</span><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a>�<a href="">10</a><a href="">11</a><a href="">12</a>...<a href="">100</a><a href="">101</a><a href="">next >></a>
        </div> -->
     
           
     
     
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