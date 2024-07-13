<?php

namespace App\DataObjects\Inputs;

use Illuminate\Http\Request;

interface InputContract{
    public static function buildFromRequest(Request $request);
}
