<?php declare(strict_types=1);

namespace PHOTOGALLERY;

abstract class HTTP {
    public static function init() {
        date_default_timezone_set('UTC');
        header_remove("X-Powered-By");
        if (isset($_GET['path']) && trim($_GET['path']) !== '') {
            self::$path = explode('/', rtrim($_GET['path'], '/'));
        }
    }

    public static function path(int $index = -1) {
        if ($index < 0)
            return $_GET['path'];
        elseif ($index < self::pathLength())
            return self::$path[$index];
        else
            return '';
    }

    private static function request(string $name = '', $default = NULL) {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                $data = $_GET;
                if ($name = '')
                    return $data;
                else {
                    return $data[$name] ?? $default;
                }
            }
            case 'POST': {

            }
            case 'PUT': {

            }
        }
    }

    private static function pathLength() {
        return count(self::$path);
    }

    private static $path = array();
}

