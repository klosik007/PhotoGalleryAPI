<?php

namespace PHOTOGALLERY;

abstract class DB {
    public static function open(): \mysqli {
        if (!isset(self::$db)) {
            self::$db = new \mysqli(
                Settings::$db['host'],
                Settings::$db['username'],
                Settings::$db['password'],
                Settings::$db['database'],
                Settings::$db['port']
            );
        }

        return self::$db;
    }

    public static function runRollback(\MySQLi $db, string $message = '') {
        $db->rollback();
        $db->autocommit(true);

        return $message;
    }

    public static function beginTransaction(\MySQLi $db) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $db->autocommit(false);
        $db->begin_transaction();
    }

    private static $db;
}