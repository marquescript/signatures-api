<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class PlanPolicy
{
    public function admin(User $user): bool
    {
        return $user->isAdmin();
    }
}
