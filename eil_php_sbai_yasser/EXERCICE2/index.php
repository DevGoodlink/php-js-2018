<!DOCTYPE html>
<html>
<head>
	<title>EXERCICE 2</title>
</head>
<body>
<form action="index.php" method="POST">
	<label>Nom</label><input type="text" name="nom"><br>
	<label>Prénom</label><input type="text" name="prenom"><br>
	<label>Adresse</label><textarea name="adresse" cols="10" rows="5"></textarea><br>
	<label>Code postal</label><input type="number" name="cp"><br>
	<label>Ville</label><input type="text" name="ville"><br>
	<button type="submit">Afficher</button>
</form>
<?php
//initialise les variables pour le tableau en bas
$nom=$prenom=$adresse=$cp=$ville="";

//test si une requête poste a été envoyé par le client
if(!empty($_POST)){
	$nom=isset($_POST["nom"])?$_POST["nom"]:"";
	$prenom=isset($_POST["prenom"])?$_POST["prenom"]:"";
	$adresse=isset($_POST["adresse"])?$_POST["adresse"]:"";
	$cp=isset($_POST["cp"])?$_POST["cp"]:"";
	$ville=isset($_POST["ville"])?$_POST["ville"]:"";
	//n'affiche le tableau en bas qu'après une requête post
?>


<table border="solid" width="100%">
	<tr>
		<td>Nom</td>
		<td><?=$nom?></td>
	</tr>
	<tr>
		<td>Prénom</td>
		<td><?=$prenom?></td>
	</tr>
	<tr>
		<td>Adresse</td>
		<td><?=$adresse?></td>
	</tr>
	<tr>
		<td>Code postal</td>
		<td><?=$cp?></td>
	</tr>
	<tr>
		<td>Ville</td>
		<td><?=$ville?></td>
	</tr>
</table>
<?php
}
?>
</body>
</html>