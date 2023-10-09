<?php

namespace PHOTOGALLERY;

require_once 'include/DB.php';
require_once 'include/HTTP.php';
require_once 'include/DbCredentials.php';
require_once 'include/Settings.php';
require_once 'include/Result.php';

HTTP::init();
echo HTTP::path(0);
if (HTTP::path(0) != '') {
    $partFile = 'parts/' . HTTP::path(0) . '.php';
    if (file_exists($partFile)) {
        include $partFile;
    }
    else {
        HTTP::returnsApplicationJSON();
        HTTP::return404();
    }
}
else {
    include 'parts/index.php';
}