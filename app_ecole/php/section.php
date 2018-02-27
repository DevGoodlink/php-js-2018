<?php
require 'connexion.php';
//if(!empty($_GET)){
	//$idsection=isset($_GET['idsection'])?$_GET['idsection']:null;
	//if($idsection){
	$req = $bdd->prepare('SELECT * FROM section WHERE true');
	// On passe les arguments dans l’ordre via un tableau
	$req->execute();//array(':idsection'=>intval($idsection)));
	$res='[';
	while($donnees = $req->fetch()){
		$res.='{"id":"'.$donnees['idsection'].'","libelle":"'.$donnees['libelle'].'"},';
	}
	$res = substr($res, 0,strlen($res)-1);
	echo $res.']';
	$req->closeCursor();
	//}
//}

?>