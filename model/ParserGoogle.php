<?php

class ParserGoogle 
{
    public function getData($q)
    {
        $data = array();
        $baseUri = 'https://ajax.googleapis.com/ajax/services/search/web?v=1.0';
        $requestUri = $baseUri . '&q=' . urlencode($q) . '&userip=' . $_SERVER['REMOTE_ADDR'];
        $responseJson = file_get_contents($requestUri);
        $response = json_decode($responseJson);
        foreach ($response->responseData->results as $result) {
            $data[] = array(
                'url' => $result->url,
                'title' => $result->title,
                'content' => $result->content,
                'displayUrl' => $result->visibleUrl
            );
        }
        return $data;
    }
}
