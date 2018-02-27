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
<label>Agglomération</label>
<input type="radio" id="oui" value="Oui" name="Agglomération" checked>Oui 
<input type="radio" id="non" value="Non" name="Agglomération"> Non
<br>
<label>Limitation de vitesse</label>
<input type="number" id="limitation"><br>
<label>Vitesse mesurée</label>
<input type="number" id="vitesse"><br>
<button type="submit" id="calculer">Calculer</button>
<div id="result">
	

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#calculer").click(function(){
			console.log("Start capturing values");
			var aglo=$('#oui').is(":checked");//?true:false;
			var limitation=$("#limitation").val();
			var vitesse=$("#vitesse").val();

			console.log("aglo : "+aglo + " limitation : "+limitation + " vitesse : "+ vitesse )
			calc(aglo,vitesse,limitation);
		});

		function calc( aglo,vitesse,limitation){
			console.log("Appel ajax");
			var resultat=[];
			$.ajax({
				url: 'exo.php',
				type: 'get',
				dataType: 'json',
				data: {aglo : aglo,
					vitesse:vitesse,
					limitation:limitation}
			})
			.done(function(data) {
				console.log(data);
				console.log("success");
				
				$("#result").html("Nombre points à enlever sur le permis = "+ data.points + " et une amande de : "+data.amande + "euros");

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});
</script>
</body>
</html>