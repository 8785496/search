<?php

class Parser 
{
    public static function getContent($parserName, $q) 
    {
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
