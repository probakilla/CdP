<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Backlog</title>

		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<style> textarea { resize: none; } </style>
	</head>
	<body>
		<?php
			require_once "Utils.php";
			require_once "Database.php";

			if ($_SERVER['REQUEST_METHOD'] !== 'GET' && !isset($_GET["projectname"]))
				IO::error("Un problème est survenu lors de la requête de cette page... Peut-être n'êtes vous pas censé vous trouvez ici ?");
			$project = $_GET['projectname'];
			$database = new Database();
		?>
		<div class="text-center">
		    <a class="btn btn-primary" href="HomePage.php">Accueil</a>
		</div>
		    <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title pull-left">Projet : <?php echo $project?></div>
				<div class="panel-title text-right">
					<a href="AddUserStory.php?projectname=<?php echo $project?>" value="Ajouter une User Story">Ajouter une User Story
					</a>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				  <table class="table">
				  	<?php
						$row = $database->select("*", "UserStory", "ProjectName LIKE \"$project\"");

						echo "<thead class=\"thead-dark\">
						<tr>
						<th scope=\"col\">Id</th>
						<th scope=\"col\">Description</th>
						<th scope=\"col\">Priorité</th>
						<th scope=\"col\">Difficulté</th>
						</tr>
							</thead>";
					echo "<tbody>";
						foreach ($row as $value)
						{
							echo "<tr>";
							echo "<th scope=\"row\">".$value["Id"]."</th>";
							echo "<td>".$value["Description"]."</td>";
							echo "<td>".$value["Priority"]."</td>";
							echo "<td>".$value["Difficulty"]."</td>";
							echo "</tr>";
						}
					echo "</tbody>";
					?>
				  </table>
				</div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
