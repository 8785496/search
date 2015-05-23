<?php

class Config
{
    private static $provs = array();
    
    public static function setProvs($provs)
    {
        self::$provs = $provs;
    }
    
    public static function getProvs()
    {
        return self::$provs;
    }
}