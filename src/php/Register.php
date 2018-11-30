<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta charset="utf-8" />
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">
        <!-- Website Font style -->
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One'
              rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen'
              rel='stylesheet' type='text/css'>
        <!-- Bootstrap Javascript -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script
         src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
         integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
         crossorigin="anonymous" defer>
         </script>
            <?php
            require_once "models/Error.php";
            require_once "models/Database.php";
            require_once "models/View.php";
            define("UNAME_URI", "username");
            $database = new Database();
            ?>
    </head>
    <body>

        <?php
        if ((isset($_SESSION[UNAME_URI])) && (!empty($_SESSION[UNAME_URI]))) {
            include "UserMenu.php";
        }
        ?>

        <h1 class="text-center mt-5">Inscription</h1>
        <div class="text-center jumbotron mt-5">
            <?php
            if (CdPError::checkRequestMethod("POST")) {
                $data = [
                    "Name" => CdPError::testInput($_POST[UNAME_URI]),
                    "Password" => hash('sha512', CdPError::testInput($_POST["password"]))
                ];
                try {
                    $database->insert("User", $data);
                    CdPError::redirectTo("HomePage.php");
                } catch (Exception $e) {
                    echo '<span class="badge badge-danger">Erreur</span>'." Ce nom d'utilisateur est déjà pris !";
                } finally {
                    $database = null;
                }
            }
            ?>
        </div>

        <div class="container">
        	<div class="row justify-content-center">
    			<div class="col-md-6 col-md-offset-3">
    				<div class="panel panel-login">
    					<div class="panel-heading">
    						<div class="row">
    							<div class="col text-left">
    								<a href="LogIn.php" class="btn btn-outline-primary">Connexion</a>
    							</div>
    							<div class="col text-right">
    								<a href="Register.php" class="btn btn-outline-secondary active">Inscription</a>
    							</div>
    						</div>
    						<hr>
    					</div>
    					<div class="panel-body">
    						<div class="row">
    							<div class="col-lg-12">
    								<form action="?" method="post" role="form" style="display: block;">
    									<div class="form-group">
    										<input type="text" name="username" tabindex="1" class="form-control" placeholder="Pseudonyme" value="">
    									</div>
    									<div class="form-group">
    										<input type="password" name="password" tabindex="2" class="form-control" placeholder="Mot de passe">
    									</div>
    									<div class="form-group">
    										<div class="row">
    											<div class="col col-sm-offset-3 text-center">
    												<input type="submit" name="login-submit" tabindex="4" class="form-control btn btn-outline-info" value="Valider">
    											</div>
    										</div>
    									</div>
    								</form>
                                    <div class="row">
                                        <div class="col col-sm-offset-3 text-center">
                                            <a tabindex="4" id="home-btn" class="btn btn-primary" href="HomePage.php">Accueil</a>
                                        </div>
                                    </div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </body>
</html>
