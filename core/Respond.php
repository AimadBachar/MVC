<?php 

namespace App\Core;

class Respond
{   
    /**
     * set response status code
     * @param int $code
     * @return void
     */
    public function setStatusCode ($code)
    {
        return http_response_code($code);
    }
}