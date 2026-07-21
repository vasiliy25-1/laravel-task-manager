<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function assign(User $user, Category $category): Response
    {
        if (!$user->ownsCategory($category)) {
            return Response::deny(__('auth.not_own_category'));
        }

        return Response::allow();
    }

    public function view(User $user, Category $category): Response
    {
        if (!$user->ownsCategory($category)) {
            return Response::deny(__('auth.not_own_category'));
        }

        return Response::allow();
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Category $category): Response
    {
        if (!$user->ownsCategory($category)) {
            return Response::deny(__('auth.not_own_category'));
        }

        return Response::allow();
    }

    public function delete(User $user, Category $category): Response
    {
        if (!$user->ownsCategory($category)) {
            return Response::deny(__('auth.not_own_category'));
        }

        return Response::allow();
    }
}
