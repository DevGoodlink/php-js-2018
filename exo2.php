<?php
$res=null;
if(!empty($_POST)){
	$nbParticipants=$_POST["nbParticipants"]?$_POST["nbParticipants"]:null;
	$salaireMoyen=$_POST["salaireMoyen"]?$_POST["salaireMoyen"]:null;
	$dureeReunion=$_POST["dureeReunion"]?$_POST["dureeReunion"]:null;
	if($nbParticipants && $salaireMoyen && $dureeReunion){
		$dureeEnHeure=$dureeReunion/60;
		$coutSalarieParHeure=$salaireMoyen/151;
		$res=$dureeEnHeure*$coutSalarieParHeure*$nbParticipants;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exercice 2</title>
	<style type="text/css">
		#result{
			color: red;
			font-size: 16pt;
		}
	</style>
</head>
<body>
<form action="exo2.php" method="post">
<label>Nombre de participants</label><input type="number" name="nbParticipants" value="<?=$nbParticipants?>"><br>
<label>Salaire moyen mensuel</label><input type="number" name="salaireMoyen" value="<?=$salaireMoyen?>"><br>
<label>Durée réunion en minutes</label><input type="number" name="dureeReunion" value="<?=$dureeReunion?>"><br>
<button type="submit">Calculer</button>
</form>
<div id="result">Cette réunion a couté  : <?= round($res,2)?> &euro;</div>
</body>
</html>