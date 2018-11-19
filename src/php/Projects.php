<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Projets</title>

		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<style> textarea { resize: none; } </style>
		<?php
			require_once "Database.php";
		?>
	</head>
	<body>
		    <br>
	<div class="text-center">
        <a class="btn btn-primary" href="HomePage.php">Accueil</a>
    </div>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Liste des projets</div>
			<div class="panel-body">
				<div class="table-responsive">
				  <table class="table">
				  	<?php
						$database = new Database();

					    if(isset($_GET["Delete"])){
					    	$project = $_GET['Delete'];
							$database->delete("UserStory",
											  "ProjectName LIKE \"$project\"");
							$database->delete("Project",
											  "Name LIKE \"$project\"");
					    }

					    if(isset($_POST['save'])){
							$projectName = $_POST["projectName"];
							$database->insert(
								"Project",
								["Name" => "$projectName"]
							);
					    }
						$result = $database->select("Name", "Project");

					    echo "<thead><tr>";
					    echo "<th scope=\"col\">Name</th>";
					    echo "</tr></thead><tbody>";

						foreach ($result as $value) {
							echo '<tr>
								<th scope="row" >
								<a href="Backlog.php?projectname='.$value["Name"].'">'. $value["Name"] . '</a></th>';
							echo '<td>
								<th scope="row" >
								<a id="delete-'.$value["Name"].'" href="Projects.php?Delete='. $value["Name"].'"type="submit">Supprimer</a>
								</th></td></tr>';
						}
						echo "</tbody>";
					?>
				  </table>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
