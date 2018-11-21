<?php
    if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Projets</title>

		<!--<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
        <link rel="stylesheet"
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                crossorigin="anonymous">

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<style> textarea { resize: none; } </style>
		<?php
			require_once "Database.php";
		?>
	</head>
	<body>

        <?php
            if ((isset($_SESSION['username'])) && (!empty($_SESSION['username']))) {
                include("UserMenu.php");
            }
        ?>

    <h1 class="text-center mt-5">Vos projets</h1>

    <div class="text-center jumbotron mt-5">
    </div>

	<div class="text-center">
        <a class="btn btn-primary" href="HomePage.php">Accueil</a>
    </div>
    <br>
	<div class="col-sm-offset-3 col-sm-6 mx-auto">
		<div class="panel panel-info">
			<div class="panel-heading mb-5"><h5>Liste des projets</h5></div>
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

					    echo "<thead class=\"thead-dark\"><tr>";
					    echo "<th class=\"w-100\" scope=\"col\">Name</th>";
					    echo "</tr></thead><tbody>";

						foreach ($result as $value) {
							echo '<tr>
								<th scope="row" >
								<a id="backlog-'.$value["Name"].'" href="Backlog.php?projectname='.$value["Name"].'">'. $value["Name"] . '</a></th>';
							echo '<td>
								<a id="delete-'.$value["Name"].'" href="Projects.php?Delete='. $value["Name"].'"type="submit">Supprimer</a>
								</td></tr>';
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
