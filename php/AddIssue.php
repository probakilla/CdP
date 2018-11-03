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
            $project = "Test";
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=CdP;charset=utf8', 'root', '');
                $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // Error Handling
                $sql = "INSERT INTO Issue SET
                ProjectName = \"$project\",
                Id = 1,
                Description = \"En tant qu\'étudiant, je souhaite pouvoir faire fonctionner ce code\",
                Priority = 1,
                Difficulty = 3;";
                $bdd->exec($sql);
            }
            catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        ?>

        <h3 class="text-center">Project : <?php echo $project; ?></h3>

    </body>
</html>
