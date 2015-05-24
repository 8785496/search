<?php
define('BASE_DIR', __DIR__);

require BASE_DIR . '/lib/IParser.php';
require BASE_DIR . '/lib/Helper.php';

$provsJson = file_get_contents(BASE_DIR . '/config/provider.json');
$provs = json_decode($provsJson, true);

if (isset($_GET['p']) && isset($_GET['q'])){    
    $p = $_GET['p'];
    $q = $_GET['q'];
    if(strlen($q) == 0 || !isset($provs[$p])) {
        header('Location: .');
        exit;
    }
    $parser = Helper::createParser($provs[$p]['parser'], 'IParser');
    Helper::render('list', array(
        'data' => $parser->getData($q),
        'provs' => $provs,
        'p' => $p,
        'q' => $q
    ));
} else {
    Helper::render('default', array(
        'provs' => $provs
    ));
}