<?php

class ParserGoogle implements IParser 
{
    /**
     * Gets data from Google
     * 
     * @param string $q query
     * @param array $params
     * @return array
     */
    public function getData($q, $params) 
    {
        $responseJson = $this->getJsonFromGoogle($q);
        $response = json_decode($responseJson);
        $data = array();
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
    /**
     * Gets data format JSON from Google
     * 
     * @param string $q query
     * @return string
     */
    private function getJsonFromGoogle($q) 
    {
        $baseUri = 'https://ajax.googleapis.com/ajax/services/search/web?v=1.0';
        $requestUri = $baseUri . '&q=' . urlencode($q) . '&userip=' . $_SERVER['REMOTE_ADDR'];
        return file_get_contents($requestUri);
    }
}
