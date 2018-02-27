<?php
function test($vitesse, $limitation){
	$difference = $vitesse - $limitation;

	$result=array();
	switch (true) {
		case ($difference==0 || $difference<0):
			$result["points"]=0;
			$result["amande"]=0;
			break;

		case ($difference<20):
			$result["points"]=1;
			$result["amande"]=90;
			break;
		case ($difference<30):
			$result["points"]=2;
			$result["amande"]=135;
			break;
		case ($difference<40):
			$result["points"]=3;
			$result["amande"]=135;
			return "inférieur à 40";
			break;
		case ($difference>=40):
			$result["points"]=6;	
			$result["amande"]=1500;
			break;
		
		
	}
	return $result;
}
if(!empty($_GET)){
	$aglo = $_GET["aglo"]?$_GET["aglo"]:null;
	$limitation = $_GET["limitation"]?$_GET["limitation"]:null;
	$vitesse = $_GET["vitesse"]?$_GET["vitesse"]-($_GET["vitesse"]* 0.05):null;
	$difference = $limitation-$vitesse;
	if($difference != 0){
		if($aglo){
			if($limitation && $vitesse){
				$resultat = test($vitesse,$limitation);
				header('Content-type: application/json');
				echo json_encode($resultat);

			}
		}
		else
		{
			if($limitation && $vitesse){
				$resultat["amande"]=intval($resultat["amande"])/2;
				header('Content-type: application/json');
				echo json_encode($resultat);

			}
		}
	}
	else{
		header('Content-type: application/json');
		echo json_encode($resultat);

	}
	

	

}

?>