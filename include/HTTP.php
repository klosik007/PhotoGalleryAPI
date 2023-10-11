<?php declare(strict_types=1);

namespace PHOTOGALLERY;

abstract class HTTP {
    public static function init(): void {
        date_default_timezone_set('UTC');
        header_remove("X-Powered-By");
        if (isset($_GET['path']) && trim($_GET['path']) !== '') {
            self::$path = explode('/', rtrim($_GET['path'], '/'));
        }
    }

    public static function path(int $index = -1): string {
        if ($index < 0)
            return $_GET['path'];
        elseif ($index < self::pathLength())
            return self::$path[$index];
        else
            return '';
    }

    public static function requestString(string $name, ?string $default): ?string {
        $val = self::request($name, $default);
        return (is_string($val)) ? $val : $default;
    }

    public static function requestInt(string $name, ?int $default): ?int {
        $val = self::request($name, $default);
        return (is_numeric($val)) ? intval($val) : $default;
    }

    public static function requestBool(string $name, ?bool $default): ?bool {
        $val = self::request($name, $default);
        $boolVal = filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        return ($boolVal !== null) ? $boolVal : $default;
    }

    public static function returnsApplicationJSON(): void {
        header('Content-type: application/json; charset=utf-8');
    }

    public static function wantsPost(): void {
        if (!self::isPost()) {
            self::return405();
            die();
        }
    }

    public static function wantsGet(): void {
        if (!self::isGet()) {
            self::return405();
            die();
        }
    }

    public static function return400($response = Result::http400): void {
        http_response_code(400);
        echo json_encode($response);
    }

    public static function return401($response = Result::http401): void {
        http_response_code(401);
        echo json_encode($response);
    }

    public static function return403($response = Result::http403): void {
        http_response_code(403);
        echo json_encode($response);
    }

    public static function return404($response = Result::http404): void {
        http_response_code(404);
        echo json_encode($response);
    }

    public static function return405($response = Result::http405): void {
        http_response_code(405);
        echo json_encode($response);
    }

    public static function return406($response = Result::http406): void {
        http_response_code(406);
        echo json_encode($response);
    }

    public static function return415($response = Result::http415): void {
        http_response_code(415);
        echo json_encode($response);
    }


    public static function return501($response = Result::http501): void {
        http_response_code(501);
        echo json_encode($response);
    }

    public static function authenticateAPI(): array {
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $matches = null;
            if (preg_match('/apikey ([0-9a-z]*)/i', $headers['Authorization'], $matches) == 1) {
                $apikey = $matches[1];
            }
        }

        $result = self::checkAPIKey($apikey ?? '');
        if ($result == Result::http401)
            sleep(5);

        return $result;
    }

    private static function checkAPIKey(string $apiKey): array {
        if ($apiKey == SettingsLocal::API_KEY)
            return Result::OK();
        else
            return Result::http401;
    }

    private static function request(string $name = '', $default = null) {
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
                if (self::isJSON()) {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if ($name == '')
                        return $data;
                    else {
                        return $data[$name] ?? $default;
                    }
                } elseif (isset($_POST[$name]))
                    return $_POST[$name];
                else
                    return $default;
            }
            default:
                return null;
        }
    }

    private static function pathLength(): int {
        return count(self::$path);
    }

    private static function isJSON(): bool {
        $contentType = "application/json";
        return strcasecmp(substr(self::contentType(), 0, strlen($contentType)), $contentType) == 0;
    }

    private static function isGet(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    private static function isPost(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    private static function contentType(): string {
        return $_SERVER['CONTENT_TYPE'] ?? '';
    }

    private static array $path = array();
}

