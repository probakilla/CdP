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
						$servername = "mariadb";
						$username = "root";
						$password = "root";
						$dbname = "CdP";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						}

						$bdd = new PDO('mysql:host=mariadb;dbname=CdP;charset=utf8', 'root', 'root');
					    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

					    if(isset($_GET["Delete"])){
					    	$project = $_GET['Delete'];
							$sqldi = "DELETE FROM UserStory WHERE ProjectName LIKE \"$project\"";
							$sqldp = "DELETE FROM Project WHERE Name LIKE \"$project\"";
					    	$bdd->exec($sqldi);
					    	$bdd->exec($sqldp);
					    }

					    if(isset($_POST['save'])){
					    	$sql1 = "INSERT INTO `Project` (`Name`) VALUES ('".$_POST["projectName"]."')";
					        $bdd->exec($sql1);
					    }

						$sql = "SELECT Name FROM Project";
						$result = $conn->query($sql);

					    echo "<thead><tr>";
					    echo "<th scope=\"col\">Name</th>";
					    echo "</tr></thead><tbody>";

						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						    	echo "<form method=\"get\" action=\"Backlog.php\">";
						    	echo "<tr><th scope=\"row\" ><a href=\"Backlog.php?projectname=". $row["Name"]."\" type=\"submit\">". $row["Name"]."</a></th>";
						    	echo "<td><th scope=\"row\" ><form method=\"get\" action=\"Projects.php?Delete=". $row["Name"]."\">   <a href=\"Projects.php?Delete=". $row["Name"]."\" type=\"submit\">Supprimer</a></form>      </td></tr>";
						    	echo "</form>";
						    }
						} else {
						    echo "0 results";
						}
						echo "</tbody>";
						$conn->close();
					?>
				  </table>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
