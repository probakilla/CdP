<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ajout d'une User Story</title>
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
            define("URI_ARGS", array("projectname"));
            $database = new Database();
            $project = "";
            ?>
    </head>
    <body>

        <h1 class="text-center mt-5">Ajout d'une user story</h1>
        <div class="text-center jumbotron mt-5">
<?php

if ((isset($_SESSION[UNAME_URI])) && (!empty($_SESSION[UNAME_URI]))) {
    include "UserMenu.php";
    $username = $_SESSION[UNAME_URI];
    $project = CdPError::testInput($_GET["projectname"]);

    if (CdPError::correctGetRequest(URI_ARGS) && !$database->exists(
        "Project.Name",
        "Project, ProjectUsers",
        "Project.Name=ProjectUsers.ProjectName AND Project.Name=\"$project\" AND ProjectUsers.UserName=\"$username\""
    )) {
        CdPError::redirectTo("HomePage.php");
    } else if (CdPError::checkRequestMethod("POST")) {
        $data = [
            "ProjectName" => CdPError::testInput($_POST["project"]),
            "Id" => CdPError::testInput($_POST["id"]),
            "Description" => CdPError::testInput($_POST["desc"]),
            "Priority" => CdPError::testInput($_POST["prio"]),
            "Difficulty" => CdPError::testInput($_POST["diff"])
        ];
        try {
            $database->insert("UserStory", $data);
            CdPError::redirectTo("Backlog.php?projectname=".$data["ProjectName"]);
        } catch (Exception $e) {
            CdPError::fail($e->getMessage(), "Projects.php");
        } finally {
            $database = null;
        }
    }
}
else {
    CdPError::redirectTo("LogIn.php");
}

?>
        </div>

        <br>

        <div class="text-center">
            <a class="btn btn-primary" href="Backlog.php?projectname=<?php echo $project ?>">Annuler
            </a>
        </div>

        <div class="container center-block">
			<div class="row main align-items-center justify-content-center">
				<div class="main-login main-center w-50">
                    <form class="mt-5" method="post" action=
                    "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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

						<div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">
                                Id
                            </label>
							<div class="cols-sm-10">
								<div class="input-group">
                                    <input type="number"
                                           class="form-control"
                                           name="id"/>
								</div>
							</div>
						</div>

						<div class="form-group">
                            <label for="username"
                                   class="cols-sm-2 control-label">
                                   Description
                            </label>
							<div class="cols-sm-10">
								<div class="input-group">
                                    <input type="text"
                                           class="form-control"
                                           name="desc"
                                           placeholder="Entrer le détail de votre user story"/>
								</div>
							</div>
						</div>

						<div class="form-group">
                            <label for="password"
                                   class="cols-sm-2 control-label">
                                   Priorité
                            </label>
							<div class="cols-sm-10">
								<div class="input-group">
                                    <select class="form-control" name="prio">
                                        <option value="high"
                                                selected>High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
								</div>
							</div>
						</div>

						<div class="form-group">
                            <label for="confirm"
                                   class="cols-sm-2 control-label">
                                   Difficulté
                            </label>
							<div class="cols-sm-10">
								<div class="input-group">
                                    <input type="number"
                                           class="form-control"
                                           name="diff"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
                            <input type="submit"
                                   class="btn btn-primary btn-lg btn-block"
                                   name="validate"
                                   value="Valider">
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>
