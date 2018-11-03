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
		<?php
			$project = $_GET['ProjectName'];
		?>
		    <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">le projet : <?php echo " ".$project; ?></div>
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

						$sql = "SELECT * FROM Issue WHERE ProjectName LIKE \"$project\"";
						$result = $conn->query($sql);
						
						echo "<thead class=\"thead-dark\">
					    <tr>
					      <th scope=\"col\">Id</th>
					      <th scope=\"col\">Description</th>
					      <th scope=\"col\">Priorité</th>
					      <th scope=\"col\">Difficulté</th>
					    </tr>
					  </thead>";
					  echo "<tbody>";

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	echo "<tr>";
						    	echo "<th scope=\"row\">".$row["Id"]."</th>";
						    	echo "<td>".$row["Description"]."</td>";
						    	echo "<td>".$row["Priority"]."</td>";
						    	echo "<td>".$row["Difficulty"]."</td>";
						    	echo "</tr>";
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