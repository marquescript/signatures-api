<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if(!$user || !Hash::check($request->get('password'), $user->password))
        {
            throw ValidationException::withMesages([
                'credentials' => 'The credentials are incorrect.'
            ]);
        }
        return [
            'access_token' => $user
                ->createToken($user->name.$user->created_at)
                ->plainTextToken
        ];
    }

    public function logout()
    {
        $user = auth()->user();
        $user->currentAccessToken()->delete();
        return response()->json(['message' => 'Token revoked'], 200);
    }

}
