<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Modification d'une user story</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>

<?php
    define('NB_PRIORITIES', 3);
    $project = $_GET['projectname'];
    $userStory   = $_GET['id'];

    abstract class priorityEnum {
        const Low    = 0;
        const Medium = 1;
        const High   = 2;
    }
?>

<h1 class="text-center mt-5">Modification de l'user story #<?php echo $userStory ?></h1>

<div class="text-center">
    <a class="btn btn-primary" href="Backlog.php?projectname=<?php echo $project ?>">Annuler</a>
</div>

<div class="text-center jumbotron mt-5">
    <?php

        function error($message) {
            echo "<span class=\"badge badge-warning\">Erreur</span> $message";
            echo nl2br("\n\nRedirection vers le backlog.");
            echo "<script type=\"text/javascript\">window.location = \"Projects.php\";</script>";
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function priorityValue($difficulty) {
          switch ($difficulty) {
         case priorityEnum::Low:
             return "Low";
          case priorityEnum::Medium:
               return "Medium";
           case priorityEnum::High:
                return "High";
            }
        }
        function currentPriority($currentPriority) {
            $out = "<select class=\"form-control\" name=\"prio\">";
            for ($i = 0; $i < NB_PRIORITIES; $i++) {
                if ($currentPriority === priorityValue($i)) {
                    $out .= "<option selected>";
                } else {
                    $out .= "<option>";
                }
                $out .= priorityValue($i) . "</option>";
            }
            return $out . "</select>";
        }


        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["projectname"]) && isset($_GET["id"])) {

            $bdd     = new PDO('mysql:host=mariadb;
            dbname=CdP;
            port=3306;
            charset=utf8',
            'root', 'root');
            $request = "SELECT *
            FROM UserStory
            WHERE ProjectName LIKE \"$project\"
            AND Id = $userStory";
            $result = $bdd->query($request);
            if (!$result)
                error("Requête à la base de donnée incorrecte");
            $currentValues = $result->fetch();

        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $desc    = test_input($_POST["desc"]);
                $prio    = test_input($_POST["prio"]);
                $diff    = test_input($_POST["diff"]);
                $bdd     = new PDO('mysql:host=mariadb;dbname=CdP;port=3306;charset=utf8', 'root', 'root');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE UserStory
                        SET Description = \"$desc\",
                            Priority = \"$prio\",
                            Difficulty = $diff;";
                $bdd->exec($sql);
                echo "<script type=\"text/javascript\">window.location = \"Backlog.php?projectname=".$project.";</script>";
            } catch (Exception $e) {
                echo $e->getMessage();
                //error($e->getMessage());
            }
        } else {
            error("Un problème est survenu lors de la requête de cette page... Peut-être n'êtes vous pas censé vous trouvez ici ?");
        }
?>
</div>

<div class="container center-block">
    <div class="row main align-items-center justify-content-center">
        <div class="main-login main-center">
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
                            <?php echo currentPriority($currentValues["Priority"]); ?>
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
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Valider">
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>
