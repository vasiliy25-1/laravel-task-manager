<?php

namespace App\Repositories;

use App\Models\User;

/**
 * @method User create(array $data)
 */
class UserRepository extends EloquentRepository
{
    public function getByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    protected function getModel(): string
    {
        return User::class;
    }
}
