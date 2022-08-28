<?php


namespace app\core;

use app\core\ErrorHelper;
use Exception;

class NotFoundException extends  Exception {

    public function __construct($message = "", $code = 404)
    {
        parent::__construct($message, $code);
    }
}