<?php

interface IParser
{
    /**
     * Get data from Google, Bing or another
     * 
     * @param string $q query
     * @param array $params
     * @return array
     */
    public function getData($q, $params);
}
