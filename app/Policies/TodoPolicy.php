<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    public function view(User $user, Todo $todo): Response
    {
        return $user->ownsTodo($todo)
            ? Response::allow()
            : Response::deny(__('auth.not_own_todo'));
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Todo $todo): Response
    {
        return $user->ownsTodo($todo)
            ? Response::allow()
            : Response::deny(__('auth.not_own_todo'));
    }

    public function delete(User $user, Todo $todo): Response
    {
        return $user->ownsTodo($todo)
            ? Response::allow()
            : Response::deny(__('auth.not_own_todo'));
    }
}
