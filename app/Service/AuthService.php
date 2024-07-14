<?php

namespace App\Service;

use App\Models\User;
use App\Providers\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class AuthService implements AuthServiceInterface
{
    public function __construct(private User $user)
    {}
    public function login(array $data)
    {
        $user = $this->user->where('email', $data['email'])->first();

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
