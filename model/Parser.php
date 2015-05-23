<?php

class Parser 
{
    public static function getContent($p, $q) 
    {
        $provs = Config::getProvs();
        $parserName = $provs[$p]['parser'];
        $filename = BASE_DIR . "/model/$parserName.php";
        if (file_exists($filename)) {
            require $filename;
            $parserData = new $parserName();
            if(method_exists($parserData, 'getData')){
                return $parserData->getData($q);
            }  
        }
        return null;
    }
}
