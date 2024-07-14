<?php

namespace App\Service;

use App\Exceptions\EntityNotFound;
use App\Models\User;

class UserService
{
    public function __construct(private User $user)
    {}
    private static $entity = 'User';
    public function find($id)
    {
        $user = self::verifyUserExists($id);
        return $user;
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update($id, array $data)
    {
        $user = self::verifyUserExists($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = self::verifyUserExists($id);
        $user->delete();
    }

    private function verifyUserExists($id)
    {
        $user = $this->user->find($id);
        throw_if(!$user, EntityNotFound::class, self::$entity);
        return $user;
    }

}
