<?php

require_once "Database.php";

class CdPError {
    /**
     * Display an error message and redirect
     * @param message The message to display
     * @param location Where the redirection leads
     */
    public static function fail($message, $location) {
        echo "<span class=\"badge badge-warning\">Erreur</span> $message";
        echo nl2br("\n\Clickez sur Ok pour être redirigé vers l'accueil.");
        self::redirectTo($location);
    }

    // FIXME
    public static function checkRequestMethod($expected, $location) {
        if (!$_SERVER["REQUEST_METHOD"] !== $expected)
            self::redirectTo($location);
    }

    public static function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function redirectTo ($location) {
        echo "<script type=\"text/javascript\">".
        "window.location=\"$location\";</script>";
    }
}


class WrongTypeException extends Exception {
    public function __construct(
        $message, $code = 0, Exception $previous = null
        ) {
        $constMsg = "WRONG TYPE EXCEPTION ! ";
        parent::__construct($constMsg.$message, $code, $previous);
        CdPError::fail($constMsg.$message, "Projects.php");
    }
}

class FailedRequestException extends Exception {
    public function __construct(
        $message, $code = 0, Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        CdPError::fail($message, "Projects.php");
    }
}