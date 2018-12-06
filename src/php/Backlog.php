<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Backlog</title>
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
        define("PNAME_URI", "projectname");
        define("DEL_URI", "delete");
        define("US_TABLE", "UserStory");

        if ((isset($_SESSION[UNAME_URI])) && (!empty($_SESSION[UNAME_URI]))) {
            $username = $_SESSION[UNAME_URI];
            $project = $_GET[PNAME_URI];
            $delete = $_GET[DEL_URI];
            include "UserMenu.php";

            $database = new Database();

        }
        else {
            CdPError::redirectTo("LogIn.php");
        }
        ?>

        <h1 class="text-center mt-5">Backlog</h1>

        <div class="text-center jumbotron mt-5">
            <?php
            if (!CdPError::checkRequestMethod('GET') || !isset($_GET[PNAME_URI])
            || !$database->exists(
                "Project.Name",
                "Project, ProjectUsers",
                "Project.Name=ProjectUsers.ProjectName AND Project.Name=\"$project\" AND ProjectUsers.UserName=\"$username\""
            )) {
                CdPError::fail("Un problème est survenu lors de la requête de cette page... Peut-être n'êtes vous pas censé vous trouvez ici ?", "HomePage.php");
            }
            else if (CdPError::checkRequestMethod('GET') && isset($_GET[PNAME_URI]) && isset($_GET[DEL_URI])
            && $database->exists(
                "Project.Name",
                "Project, ProjectUsers",
                "Project.Name=ProjectUsers.ProjectName AND Project.Name=\"$project\" AND ProjectUsers.UserName=\"$username\""
            )
            && $database->exists(
	            "Id", US_TABLE,
	            "Id=$delete AND ProjectName=\"$project\""
            )) {
                $database->delete(US_TABLE, "Id=$delete AND ProjectName=\"$project\"");
            }
            ?>
        </div>

		<div class="text-center">
		    <a id="home-btn" class="btn btn-primary" href="HomePage.php">Accueil</a>
		</div>
		    <br>
	<div class="col-sm-offset-3 col-sm-6 mx-auto">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title pull-left"><h5>Projet : <?php echo $project?></h5></div>
				<div class="panel-title text-right mb-4">
					<a href="AddUserStory.php?projectname=<?php echo $project?>" class="btn btn-outline-dark" id="add-us">Ajouter une User Story
					</a>
				</div>
				<div class="panel-title text-right mb-4">
					<a href="AddUser.php?projectname=<?php echo $project?>" class="btn btn-outline-dark" id="add-user">Ajouter un utilisateur
					</a>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				  <table class="table">
        <?php
        $row = null;
        try {
            $row = $database->select("*", "UserStory",
            "ProjectName=\"$project\"");
        } catch (Exception $exception) {
            CdPError::redirectTo(
            $exception->get_message(),
            'Projects.php'
            );
        } finally {
            $database = null;
        }
        echo '<thead class="thead-dark">
						<tr>
						<th scope="col">Id</th>
						<th class="w-75" scope="col">Description</th>
						<th scope="col">Priorité</th>
						<th scope="col">Difficulté</th>
						</tr>
							</thead>';
        echo "<tbody>";
        foreach ($row as $value)
        {
            $id = $value["Id"];
            echo "<tr>";
            echo '<th scope="row">'.$value["Id"]."</th>";
            echo View::dispListLine($value["Description"]);
            echo View::dispListLine($value["Priority"]);
            echo View::dispListLine($value["Difficulty"]);
            echo View::dispListLine(
            View::addRedirectButton(
            "EditUserStory.php?projectname=$project&id=$id",
            "edit".$project.$id, "Editer")
            );
            echo View::dispListLine(
            View::addRedirectButton(
            "Backlog.php?projectname=$project&delete=$id",
            DEL_URI.$project.$id, "Supprimer")
            );
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
