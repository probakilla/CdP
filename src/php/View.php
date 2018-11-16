<?php

define('NB_PRIORITIES', 3);

abstract class priorityEnum {
    const Low    = 0;
    const Medium = 1;
    const High   = 2;
}

class View {
    public static function addRedirectButton ($location) {
        return '<a href="' . $location . '" type="submit"> Editer</a>';
    }

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