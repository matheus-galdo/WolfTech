<?php

namespace App\Exceptions;

use App\Http\Controllers\ErroLogin;
use Exception;

class InvalidCredentialsException extends Exception
{
    //

    public function render($request)
    {
        return response()->json(["message" => $this->message], $this->code);
    }
}
