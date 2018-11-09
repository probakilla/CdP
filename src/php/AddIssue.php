<!DOCTYPE html>
<html>
    <head>
        <title>Ajout d'une issue</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <!-- Bootstrap Javascript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>
    </head>
    <body>
        <h1 class="text-center mt-5">Ajout d'une issue</h1>

        <div class="text-center jumbotron mt-5">
            <?php
                function error($message) {
                    echo "<span class=\"badge badge-warning\">Erreur</span> $message";
                    echo nl2br ("\n\nRedirection vers le backlog d'ici 5 secondes.");
                    echo "<script type=\"text/javascript\">window.location = \"Projects.php\";</script>";
                }
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $project = "";
                if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["projectname"])) {
                    $project = test_input($_GET["projectname"]);
                }
                else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    try {
                        $project = test_input($_POST["project"]);
                        $id = test_input($_POST["id"]);
                        $desc = test_input($_POST["desc"]);
                        $prio = test_input($_POST["prio"]);
                        $diff = test_input($_POST["diff"]);
                        $bdd = new PDO('mysql:host=mariadb;
                                              dbname=CdP;
                                              charset=utf8',
                                              'root',
                                              'root');
                        $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // Error Handling
                        $sql = "INSERT INTO Issue
                                SET ProjectName = \"$project\",
                                    Id = $id,
                                    Description = \"$desc\",
                                    Priority = \"$prio\",
                                    Difficulty = $diff;";
                        $bdd->exec($sql);

                        echo "<script type=\"text/javascript\">window.location = \"Backlog.php?ProjectName=$project\";                       </script>";
                    }
                    catch (Exception $e) {
                        error($e->getMessage());
                    }
                }
                else {
                    error("Un problème est survenu lors de la requête de cette page... Peut-être n'êtes vous pas censé vous trouvez ici ?");
                }
            ?>
        </div>

        <div class="text-center">
            <a class="btn btn-primary" href="Backlog.php?ProjectName=<?php echo $project ?>">Annuler</a>
        </div>

        <div class="container center-block">
			<div class="row main align-items-center justify-content-center">
				<div class="main-login main-center">
				<h5>Ajouter une issue au projet courant :</h5>
					<form class="mt-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Projet</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="project" "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" value=<?php echo $project; ?> readonly/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Id</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="number" class="form-control" name="id"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Description</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="desc" placeholder="Entrer le détail de votre issue"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Priorité</label>
							<div class="cols-sm-10">
								<div class="input-group">
                                    <select class="form-control" name="prio">
                                        <option value="high" selected>High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Difficulté</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="number" class="form-control" name="diff"/>
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
