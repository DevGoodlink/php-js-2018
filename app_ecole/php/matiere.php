<?php
require 'connexion.php';

$req = $bdd->prepare('SELECT * FROM matiere WHERE true');
// On passe les arguments dans l’ordre via un tableau
$req->execute();
$res='[';
while($donnees = $req->fetch()){
	$res.='{"id":"'.$donnees['idmatiere'].'","libelle":"'.$donnees['libelle'].'"},';
}
$res = substr($res, 0,strlen($res)-1);
echo $res.']';
$req->closeCursor();


?>