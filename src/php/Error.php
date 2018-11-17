<?php

require_once "Database.php";

class CdPError {
    const HOME = "HomePage.php";
    const PROJECTS = "Projects.php";

    /**
     * Display an error message and redirect
     * @param String $message The message to display
     * @param String $location Where the redirection leads
     */
    public static function fail($message, $location) {
        echo '<span class="badge badge-warning">Erreur</span>'.$message;
        echo nl2br("\n\Clickez sur Ok pour être redirigé vers l'accueil.");
        self::redirectTo($location);
    }

    /**
     * Check if the current request is the one excpeted
     * @param Array $argsArray default value is null, else check if
     * all uri args are set
     * @return Boolean true if the arguments are set, false otherwise
     */
    public static function correctGetRequest($argsArray = null) {
        if ($_SERVER["REQUEST_METHOD"] !== "GET")
            return false;
        if ($argsArray !== null)
            foreach ($argsArray as $value)
                if (!isset($_GET[$value]))
                    return false;
        return true;
    }

    /**
     * Check if the requested method is correct
     * @param String The name of the request (GET, POST, PUT etc...)
     * @return Boolean true if the request is correct, false otherwise
     */
    public static function checkRequestMethod($request) {
        return ($_SERVER["REQUEST_METHOD"] === $request);
    }

    /**
     * Test if the input is correct
     * @param String The input to test
     * @return String The correct input
     */
    public static function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * Redirect the user on a specified location
     * @param String The path where to redirect the user
     */
    public static function redirectTo ($location) {
        echo '<script type="text/javascript">'.
        'window.location="'.$location.'";</script>';
    }
}


class WrongTypeException extends Exception {
    public function __construct(
        $message, $code = 0, Exception $previous = null
        ) {
        $constMsg = "WRONG TYPE EXCEPTION ! ";
        parent::__construct($constMsg.$message, $code, $previous);
        CdPError::fail($constMsg.$message, self::PROJECTS);
    }
}

class FailedRequestException extends Exception {
    public function __construct(
        $message, $code = 0, Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        CdPError::fail($message, self::PROJECT);
    }
}