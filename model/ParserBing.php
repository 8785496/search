<?php

class ParserBing implements IParser {
    /**
     * Gets data from Bing
     * 
     * @param string $q query
     * @return array
     */
    public function getData($q) {
        $responseJson = $this->getJsonFromBing($q);
        $response = json_decode($responseJson);
        $data = array();
        foreach ($response->d->results as $result) {
            $data[] = array(
                'url' => $result->Url,
                'title' => $result->Title,
                'content' => $result->Description,
                'displayUrl' => $result->DisplayUrl
            );
        }
        return $data;
    }
    /**
     * Gets data format JSON from Bing
     * 
     * @param string $q query
     * @return string
     */
    private function getJsonFromBing($q) {
        $acctKey = require(BASE_DIR . '/protect/keyBing.php');
        $rootUri = 'https://api.datamarket.azure.com/Bing/Search';
        // Encode the query and the single quotes that must surround it.
        $query = urlencode("'$q'");
        // Get the selected service operation (Web or Image).
        $serviceOp = 'Web';
        // Construct the full URI for the query.
        $requestUri = "$rootUri/$serviceOp?\$format=json&\$top=5&Query=$query";
        // Encode the credentials and create the stream context.
        $auth = base64_encode("$acctKey:$acctKey");
        $params = array(
            'http' => array(
                'request_fulluri' => true,
                // ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
                'ignore_errors' => true,
                'header' => "Authorization: Basic $auth"
            )
        );
        $context = stream_context_create($params);
        // Get the response from Bing.
        return file_get_contents($requestUri, 0, $context);
    }
}
