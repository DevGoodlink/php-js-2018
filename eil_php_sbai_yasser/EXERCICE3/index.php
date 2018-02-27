<!DOCTYPE html>
<html>
<head>
	<title>Exercice 3</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>
<body>
<table class="table" id="list">
	<th>#</th>
	<th>Serveur</th>
	<th>IPv4</th>
	<th>OS</th>
	
</table>

<div class="row">
	<div class="col-md-3"><input type="text" class="form-control mb-2 mr-sm-2" id="hostname" placeholder="Nom du serveur"></div>
	<div class="col-md-3"><input type="text" class="form-control mb-2 mr-sm-2" id="ipv4" placeholder="IPv4"></div>
	<div class="col-md-3">
		<select class="form-control mb-2 mr-sm-2" id="os">
		  <option value="Debian 9">Debian 9</option>
		  <option value="Debian 8">Debian 8</option>
	  </select>
	</div>
	<div class="col-md-3"><button id="send" class="btn btn-primary mb-2">Ajouter</button></div>
</div>
 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
	$(document).ready(function($) {
		//Récupére la liste des serveurs au démarage de la page
		$.ajax({
			url: 'php/serveurs.php',
			type: 'get',
			dataType: 'json',
		})
		.done(function(data_) {
			console.log("success");
			data_.forEach(function(elt){
				//parcours les éléments de la réponse sous format json et les affiche dans une ligne de tableau
				$("#list").append("<tr><td>"+elt.id+"</td><td>"+elt.hostname+"</td><td>"+elt.ipv4_adress+"</td><td>"+elt.os_version+"</td></tr>");
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		$("#send").click(function(event) {
			var ipv4 = $("#ipv4").val();
			var hostname =$("#hostname").val() ;
			var os =$("#os").val();
			console.log(ipv4 + hostname + os);
			$.ajax({
			url: 'php/serveurs.php',
			type: 'post',
			data:{
				hostname:hostname,
				ipv4:ipv4,
				os:os
			},
		})
		.done(function(data_) {
			//data_ contient l'id du dernier élément inséré, 
			//j'utilise les valeurs entrées par l'utilisateurs pour l'affichage sur le tableau
			console.log("success");
			$("#list").append("<tr><td>"+data_.id+"</td><td>"+hostname+"</td><td>"+ipv4+"</td><td>"+os+"</td></tr>");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		});
	});
</script>
</body>
</html>