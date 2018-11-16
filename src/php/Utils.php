<?php

require_once "Database.php";

class IO
{
    /**
     * Display an error message and redirect
     * @param message The message to display
     * @param location Where the redirection leads
     */
    public static function error($message, $location)
    {
        echo "<span class=\"badge badge-warning\">Erreur</span> $message";
        echo nl2br("\n\nRedirection vers le backlog d'ici 5 secondes.");
        self::redirectTo($location);
    }

    public static function checkRequestMethod($expected, $location)
    {
        if (!$_SERVER["REQUEST_METHOD"] !== $expected)
            self::redirectTo($location);
    }

    public static function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function redirectTo ($location)
    {
        echo "<script type=\"text/javascript\">".
        "window.location=\"$location\";</script>";
    }
}
