<?php

class GlobalFunctions extends CController
{
    public static function truncate($string)
    {
        if (strlen($string) > 20) {
            $new = substr($string, 0, 20) . "...";
        } else {
            $new = $string;
        }
        return $new;
    }

}

?>