<?php
// si on re�oit une donn�e
if(isset($_GET['q'])) {
    $q = htmlentities($_GET['q']); // protection
     //echo $q;exit;
    // connexion � la base de donn�es
    
	$connection = mysql_connect('localhost', 'root', '');	
	$db = mysql_select_db('userdata', $connection);

	/*try {
        $bdd = new PDO('mysql:host=localhost;dbName=userdata', 'root', '');
    } catch(Exception $e) {
        exit('Impossible de se connecter � la base de donn�es.');
    }*/
	
    // �criture de la requ�te
    $requete = "SELECT Name	FROM userdetail WHERE Name LIKE '". $q ."%' LIMIT 0, 10";
    //echo $requete;exit;
	
	// ex�cution de la requ�te
    $resultat = mysql_query($requete);
    // affichage des r�sultats
    while($donnees = mysql_fetch_assoc($resultat)) {
        //echo"<pre>";print_r($donnees);echo"</pre>";exit;
		echo $donnees['Name'] ."\n";
    }
}
?>