<?php

namespace App\Exceptions;

use Exception;

class EntityAlreadyExists extends Exception
{
    public function render()
    {
        return response()->json(['error' => 'Informed user is already a customer'], 409);
    }
}
