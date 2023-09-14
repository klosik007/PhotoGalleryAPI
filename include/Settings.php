<?php

namespace PHOTOGALLERY;

abstract class Settings {
    public static $db = array(
        'host' => DbCredentials::HOST,
        'port' => DbCredentials::PORT,
        'database' => DbCredentials::DATABASE,
        'username' => DbCredentials::USERNAME,
        'password' => DbCredentials::PASSWORD
    );
}