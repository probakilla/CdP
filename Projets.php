<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>New Project</title>

		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<style> textarea { resize: none; } </style>
	</head>
	<body>
		    <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Liste des projets</div>
			<div class="panel-body">
				<div class="table-responsive">
				  <table class="table">
				  	<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "Cdp";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "SELECT Name FROM Project";
						$result = $conn->query($sql);

					    echo "<thead><tr>";
					    echo "<th scope=\"col\">Name</th>";
					    //echo "<th scope=\"col\">Description</th>";
					    echo "</tr></thead><tbody>";

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	echo "<tr><th scope=\"row\">". $row["Name"]."</th>";
						        //echo "<td>" . $row["Name"]. "</td>";
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