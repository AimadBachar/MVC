<?php

namespace App\Core;

class Response
{
    /**
     * set response status code
     * @param int $code
     * @return void
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}