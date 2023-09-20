<?php

namespace PHOTOGALLERY;

require_once 'include/DB.php';
require_once 'include/HTTP.php';
require_once 'include/DbCredentials.php';
require_once 'include/Settings.php';
require_once 'include/Result.php';

function activateApiAndDie(): void {
    if (file_exists('api.php')) {
        include 'api.php';
        die();
    }
}

HTTP::init();

$action = HTTP::requestString('action', '');
if (empty($action) && !empty(HTTP::path(0))) {
    activateApiAndDie();
    die();
}

activateApiAndDie();
HTTP::return404();