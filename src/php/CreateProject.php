<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Création d'un projet</title>

		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<style> textarea { resize: none; } </style>
	</head>
	<body>
    <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Creer un nouveau projet</div>
			<div class="panel-body"> 

				<form method="post" action="Projects.php">
					<input type="text" name="projectName" class="form-control" placeholder="Le nom du projet" /><br>
					<input type="submit" name="save" class="btn btn-info pull-right" value="Creer" />
				</form>

			</div>
			<div class="text-center">
	            <a class="btn btn-primary" href="HomePage.php">Annuler</a>
	        </div>
		</div>
	</div>
	</body>
</html>