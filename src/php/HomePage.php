<?php
    //if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    //}
?>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion de projets</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/HomePageStyle.css">
    </head>
    <body>

        <?php
            if ((isset($_SESSION['username'])) && (!empty($_SESSION['username']))) {
                include("UserMenu.php");
            }
        ?>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Gestionnaire de projets
                </div>
                <div class="links">
                    <a id="login" href="LogIn.php" class="btn btn-outline-secondary">
                        Connexion
                    </a>
                    <a id="register" href="Register.php" class="btn btn-outline-secondary">
                        Inscription
                    </a>
                    <br><br><br>
                    <a id="create-project" href="CreateProject.php">
                        creer un nouveau projet
                    </a><br><br>
                    <a id="list-project" href="Projects.php">
                        La liste des projets
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
