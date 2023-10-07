<?php

namespace PHOTOGALLERY;

abstract class Result {
    const http400 = ['error' => 400, 'msg' => 'HTTP 400 Bad Request'];
    const http403 = ['error' => 403, 'msg' => 'HTTP 403 Forbidden'];
    const http404 = ['error' => 404, 'msg' => 'HTTP 404 Not Found'];
    const http405 = ['error' => 405, 'msg' => 'HTTP 405 Method Not Allowed'];
    const http406 = ['error' => 406, 'msg' => 'HTTP 406 Not Acceptable'];
    const http415 = ['error' => 415, 'msg' => 'HTTP 415 Unsupported Media Type'];
    const http501 = ['error' => 501, 'msg' => 'HTTP 501 Not Implemented'];
}