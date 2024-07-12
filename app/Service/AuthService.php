<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class AuthService
{

    public function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            throw ValidationException::withMesages([
                'credentials' => 'The credentials are incorrect.'
            ]);
        }
        return $user->createToken($user->name.$user->created_at)->plainTextToken;
    }

    public function register(array $data)
    {
        User::create($data);
    }

}
