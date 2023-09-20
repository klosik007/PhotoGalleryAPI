<?php

namespace PHOTOGALLERY;

abstract class Result {
    const http404 = ['error' => 404, 'msg' => 'HTTP 404 Not Found'];
    const http405 = ['error' => 405, 'msg' => 'HTTP 405 Method Not Allowed'];
    const http501 = ['error' => 501, 'msg' => 'HTTP 501 Not Implemented'];

}