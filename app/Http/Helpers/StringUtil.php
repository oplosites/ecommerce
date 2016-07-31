<?php

namespace App\Http\Helpers;

class StringUtil {

    public static function stringToDBfieldName($string)
    {
        $string = str_replace(" ", "_", $string);
        $string = str_replace("-", "_", $string);
        $string = strtolower($string);
        return $string;
    }

    public static function contains($stringTest, $data)
    {
        return stripos($stringTest, $data) !== false;
    }

}
