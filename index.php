<?php
define('BASE_DIR', __DIR__);

require BASE_DIR . '/model/Parser.php';
require BASE_DIR . '/lib/Config.php';
require BASE_DIR . '/lib/Helper.php';

Config::setProvs(require(BASE_DIR . '/config/provider.php'));

if (isset($_GET['p']) && isset($_GET['q'])){    
    $p = $_GET['p'];
    $q = $_GET['q'];
    $provs = Config::getProvs();
    if(strlen($q) == 0 || !isset($provs[$p])) {
        header('Location: .');
        exit;
    }
    Helper::render('list', array(
        'data' => Parser::getContent($p, $q),
        'provs' => $provs,
        'p' => $p,
        'q' => $q
    ));
} else {
    Helper::render('default', array(
        'provs' => Config::getProvs()
    ));
}