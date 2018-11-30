<?php
	session_start();

define('NB_PRIORITIES', 3);

abstract class PriorityEnum {
    const LOW    = 0;
    const MEDIUM = 1;
    const HIGH   = 2;
}

class View {


    /**
     * Display a button to redirect the user
     *
     * @param  String The path where redirect the user
     * @param  String                                  $id The id of the button
     * @return String An html type string corresponding to a button
     */
    public static function addRedirectButton($location, $id = "") {
        if ($id === "") {
            $id = $location;
        }
        return '<a id="' . $id . '" href="' . $location .
         '" type="submit"> Editer</a>';
    }


    /**
     * Display a dropdown input section
     *
     * @param  String The current priority to desplay in the default field
     * @return String An html type string corresponding to a dropdown element
     */
    public static function currentPriority($currentPriority) {
        $out = "<select class=\"form-control\" name=\"prio\">";
        for ($i = 0; $i < NB_PRIORITIES; $i++) {
            if ($currentPriority === self::priorityValue($i)) {
                $out .= "<option selected>";
            } else {
                $out .= "<option>";
            }
            $out .= self::priorityValue($i) . "</option>";
        }
        return $out . "</select>";
    }


    public static function dispListLine($content) {
        return "<td>$content</td>";
    }


    public static function errorFormat($message) {
        return '<span class="badge badge-danger">Erreur</span> '.$message;
    }


    private static function priorityValue($difficulty) {
        switch ($difficulty) {
            case PriorityEnum::LOW:
          return "Low";
            case PriorityEnum::MEDIUM:
          return "Medium";
            case PriorityEnum::HIGH:
          return "High";
            default:
          break;
        }
    }


}
