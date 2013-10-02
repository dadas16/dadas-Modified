<?php
include("includes/connect.php"); 
if(isset($_POST['pc_id']) && $_POST['pc_id'] != '')
{
  $pc_id = $_POST['pc_id'];//echo $pc_id;exit;
  //$pc_id = mysql_real_escape_string(strip_tags(trim($pc_id)));
  $query = "select distinct dure from demande where module='".$pc_id."'";
  //echo $query;exit;
  $res = mysql_query($query);
  $row = mysql_fetch_assoc($res);
  $dure=$row['dure'];
  echo $dure;
  /*if(mysql_num_rows($res))
  {
    while($row = mysql_fetch_array($res))
	{
	  echo "<option value='".$row['dure']."'>".ucfirst($row['dure'])."</option>";
	}
  }*/
}
?>