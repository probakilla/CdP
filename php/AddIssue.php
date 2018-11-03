<!DOCTYPE html>
<html>
    <head>
        <title>Add Issue</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>
    </head>
    <body>
        <h1 class="text-center">Add Issue</h1>

        <?php
            $project = "";
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["projectname"])) {
                $project = $_GET["projectname"];
            }
            else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                try {
                    $project = $_POST["project"];
                    $id = $_POST["id"];
                    $desc = $_POST["desc"];
                    $prio = $_POST["prio"];
                    $diff = $_POST["diff"];
                    $bdd = new PDO('mysql:host=localhost;dbname=CdP;charset=utf8', 'root', '');
                    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // Error Handling
                    $sql = "INSERT INTO Issue SET
                    ProjectName = \"$project\",
                    Id = $id,
                    Description = \"$desc\",
                    Priority = \"$prio\",
                    Difficulty = $diff;";
                    $bdd->exec($sql);
                }
                catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
            else {
                die('Erreur !');
            }
        ?>

        <form action="?" method="post">
            <p>Projet : <input type="text" name="project" value=<?php echo $project; ?> readonly/></p>
            <p>Id : <input type="number" name="id" /></p>
            <p>Description : <input type="text" name="desc" /></p>
            <p>Priorité : <select name="prio">
                <option value="high" selected>High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select></p>
            <p>Difficulté : <input type="number" name="diff" /></p>
            <p><input type="submit" value="OK"></p>
        </form>

    </body>
</html>
