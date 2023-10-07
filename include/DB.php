<?php

namespace PHOTOGALLERY;

abstract class DB {
    public static function open() {
        $db = new \MySQLi(
            Settings::$db['host'],
            Settings::$db['username'],
            Settings::$db['password'],
            Settings::$db['database'],
            Settings::$db['port']
        );

        $db->query("set names utf8mb4");

        return $db;
    }
}