<?php
        session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Modification d'une user story</title>
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
</head>
<body>

<?php

    require_once "Database.php";
    require_once "Error.php";
    require_once "View.php";

    $project = $_GET['projectname'];
    $username = $_SESSION['username'];
    $userStory = $_GET['id'];
    $database = new Database();

    if ((isset($_SESSION['username'])) && (!empty($_SESSION['username']))) {
        include("UserMenu.php");

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["projectname"]) && isset($_GET["id"])
            && $database->exists(
                "Project.Name",
                "Project, ProjectUsers",
                "Project.Name=ProjectUsers.ProjectName AND Project.Name=\"$project\" AND ProjectUsers.UserName=\"$username\""
            )
            && $database->exists(
                "ProjectName", "UserStory",
                "ProjectName=\"$project\""
            )
            && $database->exists(
                "Id", "UserStory",
                "Id=$userStory AND ProjectName=\"$project\""
            )) {
            $currentValues = $database->select(
                "*", "UserStory",
                "ProjectName=\"$project\" AND Id=$userStory"
            )[0];
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $project = CdPError::testInput($_POST["project"]);
                $id = CdPError::testInput($_POST["id"]);
                $desc = CdPError::testInput($_POST["desc"]);
                $prio = CdPError::testInput($_POST["prio"]);
                $diff = CdPError::testInput($_POST["diff"]);
                $database->update(
                    "UserStory",
                    ["Description" => $desc,
                     "Priority" => $prio,
                     "Difficulty" => $diff],
                    'ProjectName LIKE "' . $project . '" AND Id = ' . $id
                );
                CdPError::redirectTo("Backlog.php?projectname=$project");
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        } else {
            CdPError::fail("Un problème est survenu lors de la requête de cette page... Peut-être n'êtes vous pas censé vous trouvez ici ?",
            'Backlog.php?projectname="'.$project.'"');
        }
    }
    else {
        CdPError::redirectTo("LogIn.php");
    }
?>

<h1 class="text-center mt-5">Modification de l'user story #<?php echo $userStory ?></h1>

<div class="text-center jumbotron mt-5">
</div>

<div class="text-center">
    <a class="btn btn-primary" href="Backlog.php?projectname=<?php echo $project ?>">Annuler</a>
</div>

<div class="container center-block">
    <div class="row main align-items-center justify-content-center">
        <div class="main-login main-center w-50">
            <form class="mt-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Projet</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text"
                                    class="form-control"
                                    name="project" "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                    value="<?php echo $currentValues["ProjectName"]; ?>" readonly/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Id</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="number"
                                   class="form-control"
                                   name="id"
                                   value="<?php echo $currentValues["Id"]; ?>" readonly/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Description</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text"
                                    class="form-control"
                                    name="desc"
                                    "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" value="<?php echo $currentValues["Description"]; ?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Priorité</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <?php echo View::currentPriority($currentValues["Priority"]); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Difficulté</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="number"
                            class="form-control"
                            name="diff"
                            value="<?php echo $currentValues["Difficulty"]; ?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <input type="submit" name="valid-edit-us" class="btn btn-primary btn-lg btn-block" value="Valider">
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>
