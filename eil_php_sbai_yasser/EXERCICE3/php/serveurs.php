<?php
require 'connexion.php';
if(!empty($_POST)){
	$hostname=isset($_POST['hostname'])?$_POST['hostname']:null;

	$ipv4=isset($_POST['ipv4'])?$_POST['ipv4']:null;

	$os=isset($_POST['os'])?$_POST['os']:null;

	if($hostname && $ipv4 && $os){//test si les valeurs ne sont pas null
		//je créé une requête préparée
		$req = $bdd->prepare('INSERT INTO `serveurs` (`id`, `hostname`, `ipv4_adress`, `os_version`) VALUES (NULL, :hostname, :ipv4, :os)');
	
		// On passe les arguments dans l’ordre via un tableau s'elles contiennent des valeurs
		$req->execute(array(':hostname'=>$hostname,':ipv4'=>$ipv4,':os'=>$os));
		$id = $bdd->lastInsertId();
		header('Content-type: application/json');
		echo json_encode(array('id' => $id));
	}
	

}else{
	//on récupére la liste des serveurs au tout début
	$serveurs=array();
	$req = $bdd->prepare('select * from serveurs where true');
	$req->execute();
	while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
		//j'ajoute les résultats de la requête à un tableau
		array_push($serveurs,$donnees);
	}

	header('Content-type: application/json');//Ajoute un header au résultat envoyé 
	echo json_encode($serveurs);//permet d'encoder le résultat sous format json
}

