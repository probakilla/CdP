
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row-fluid">
        <div class="span6 fixed-top text-right mt-4 mr-5">
            <h5>
                <em class="fa fa-user-circle-o"></em>
                <?php echo $_SESSION["username"] ?>
            </h5>

            <form method="post">
                <input type="submit" name="logout" class="btn btn-outline-secondary" value="Se déconnecter" />
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    require_once "Error.php";
                    unset($_SESSION["username"]);
                    CdPError::redirectTo("HomePage.php");
                }
             ?>

        </div>
    </div>
</div>
