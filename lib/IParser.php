<?php

interface IParser
{
    /**
     * Get data from Google, Bing or another
     * 
     * @param string $q query
     * @return array
     */
    public function getData($q);
}
