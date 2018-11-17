<?php

define('NB_PRIORITIES', 3);

abstract class priorityEnum {
    const Low    = 0;
    const Medium = 1;
    const High   = 2;
}

class View {
    /**
     * Display a button to redirect the user
     * @param String The path where redirect the user
     * @param String $id The id of the button
     * @return String An html type string corresponding to a button
     */
    public static function addRedirectButton ($location, $id = "") {
        if ($id === "")
            $id = $location;
        return '<a id="' . $id . '" href="' . $location . '" type="submit"> Editer</a>';
    }
    /**
     * Display a dropdown input section
     * @param String The current priority to desplay in the default field
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

    private static function priorityValue($difficulty) {
      switch ($difficulty) {
     case priorityEnum::Low:
         return "Low";
      case priorityEnum::Medium:
           return "Medium";
       case priorityEnum::High:
            return "High";
        }
    }
}