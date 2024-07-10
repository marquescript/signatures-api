<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class EntityNotFound extends Exception
{

   public function render($request)
   {
       return response()->json(['error' => $this->getMessage().' not found.'], 404);
   }
}
