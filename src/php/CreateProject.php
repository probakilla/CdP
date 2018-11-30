<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Création de projet</title>

        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<style> textarea { resize: none; } </style>
	</head>
	<body>

        <?php
            if ((isset($_SESSION['username'])) && (!empty($_SESSION['username']))) {
                include("UserMenu.php");
            }
            else {
                require_once "models/Error.php";
                CdPError::redirectTo("LogIn.php");
            }
        ?>

    <br>

    <h1 class="text-center mt-5">Création de projet</h1>
    <div class="text-center jumbotron mt-5"></div>

    <div class="container">
        <div class="row justify-content-center">
        	<div class="col-sm-offset-3 col-sm-6">
        		<div class="panel panel-info">
        			<div class="panel-body text-center">

        				<form method="post" action="Projects.php">
        					<input type="text" name="projectName" class="form-control" placeholder="Le nom du projet" /><br>
        					<input type="submit" name="save" class="btn btn-info" value="Creer" />
        				</form>

        			</div>
                    <br>
        			<div class="text-center">
        	            <a class="btn btn-primary" href="HomePage.php">Annuler</a>
        	        </div>
        		</div>
        	</div>
        </div>
    </div>

	</body>
</html>
