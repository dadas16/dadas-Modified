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
		include_once ('pagination/function.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 6;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        //$statement = "`records` where `active` = 1";
        $statement = "employe";
		$sql="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
		//echo $sql;exit;
		$resultat = mysql_query($sql);
		//echo $resultat;exit;
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
    
    <div class="right_header">Bienvenue Directeur   | <a href="login.php" class="logout">Se d�connecter</a></div>
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
        
    <h2>Liste des Directeurs </h2> 
      <form action="" method="POST">
	  <?php
						if($resultat){
							echo" 
							
<table id=\"rounded-corner\" summary=\"2007 Major IT Companies' Profit\">
 							
   <thead>
    	<tr>
        	<th scope=\"col\" class=\"rounded-company\"></th>
			<th scope=\"col\" class=\"rounded\">Nom</th>
            <th scope=\"col\" class=\"rounded\">Prenom</th>
            <th scope=\"col\" class=\"rounded\">Fonction</th>
            <th scope=\"col\" class=\"rounded\">Statut</th>
			<th scope=\"col\" class=\"rounded-q4\" colspan=\"3\" align=\"center\">Extras</th>
        
		</thead>";
    
	while($data=mysql_fetch_assoc($resultat)){
													
													//echo"<pre>";print_r($data);echo"</pre>";exit;
													//<a href='delete_formation.php?id=".$id."' id='delete'>Supprimer</a>
													$id=$data['idEmploye'];
													$cni=$data['Nom_employe'];
													$nom=ucfirst($data['Prenom_employe']);
													$prenom=ucfirst($data['fonction']);
													$mobile=ucfirst($data['statut']);
													
												
													
											
        
		echo "
		

		<tbody>
		
 
    	<tr id=".$id.">
		
        	<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$id\" />
			</td><td>$id</td>
			<td>$cni</td>
			<td>$nom</td>
			<td>$prenom</td>
			
			
			<td>$mobile</td>
			
            <td><a href='modifier_participant.php?id=".$id."'><img src=\"images/user_edit.png\" alt=\"\" title=\"Modifier\" border=\"0\" /></a></td>
			
            
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
		</ form>
		
		
		
		<?php
if(isset($_POST['checkbox'])){

foreach ($_POST["checkbox"] as $index =>$val) {

  $str_requete = "DELETE FROM participant WHERE idParticipant='$val'";
$result = mysql_query($str_requete) or die(mysql_error());
  }
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=liste.php\">";

}

}


?>

	<div class='pagination'>
		<?php
			echo pagination($statement,$limit,$page);
		
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