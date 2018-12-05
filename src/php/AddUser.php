<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ajout d'utilisateur</title>
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

            require_once "models/Error.php";
            require_once "models/Database.php";
        require_once "models/View.php";
        define("UNAME_URI", "username");

        if ((isset($_SESSION[UNAME_URI])) && (!empty($_SESSION[UNAME_URI]))) {
            $username = $_SESSION[UNAME_URI];
            $project = $_GET['projectname'];
            include "UserMenu.php";

            $database = new Database();

        }
        else {
            CdPError::redirectTo("LogIn.php");
        }
        ?>

        <h1 class="text-center mt-5">Ajout d'utilisateur</h1>

        <div class="text-center jumbotron mt-5">
            <?php
            if ((CdPError::checkRequestMethod('POST'))
            && $database->exists(
                "Project.Name",
                "Project, ProjectUsers",
                "Project.Name=ProjectUsers.ProjectName AND Project.Name=\"$project\" AND ProjectUsers.UserName=\"$username\""
            )) {
                $data = [
                       "ProjectName" => CdPError::testInput($_POST["project"]),
                       "UserName" => CdPError::testInput($_POST["username"])
                ];
                try {
                    $database->insert("ProjectUsers", $data);
                } catch (Exception $e) {
                    CdPError::fail($e->getMessage(), "Projects.php");
                } finally {
                    $database = null;
                }
            }
            else if (CdPError::checkRequestMethod('GET') || !isset($_GET["projectname"])
            || !$database->exists(
                "Project.Name",
                "Project, ProjectUsers",
                "Project.Name=ProjectUsers.ProjectName AND Project.Name=\"$project\" AND ProjectUsers.UserName=\"$username\""
            )) {
                CdPError::fail("Un problème est survenu lors de la requête de cette page... Peut-être n'êtes vous pas censé vous trouvez ici ?", "HomePage.php");
            }
            ?>
        </div>

		<div class="container center-block">
			<div class="row main align-items-center justify-content-center">
				<div class="main-login main-center w-50">
					<form method="post">
						<div class="form-group">
							<label for="name"
								   class="cols-sm-2  control-label">
								   Projet
							</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text"
										   class="form-control"
										   name="project"
										   "<?php echo
                htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
											value=<?php echo $project; ?>
											readonly/>
								</div>
							</div>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" /><br>
						<div class="form-group ">
							<input type="submit"
								   class="btn btn-primary btn-lg btn-block"
								   name="add"
								   value="Ajouter">
						</div>
					</form>
				</div>
			</div>
			<div class="text-center">
				<a id="back-btn" class="btn btn-primary" href="Backlog.php?projectname=<?php echo $project ?>">Backlog</a>
			    <a id="home-btn" class="btn btn-primary" href="HomePage.php">Accueil</a>
			</div>
		</div>
	    <br>
		<div class="col-sm-offset-3 col-sm-6 mx-auto">

		</div>
	</body>
</html>
