<?php

namespace App\Exceptions;

use Exception;

class InvalidAction extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'Invalid action: '.$this->getMessage()], 404);
    }
}
