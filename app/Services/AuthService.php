<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private UserRepository $users)
    {}

    public function register(string $email, string $password, ?string $name = null): User
    {
        return $this->users->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    }

    public function login(string $email, string $password): User
    {
        $user = $this->users->getByEmail($email);

        if ($user === null) {
            throw new AuthenticationException(__('auth.no_user'));
        }

        if (Hash::check($password, $user->password) === false) {
            throw new AuthenticationException(__('auth.password'));
        }

        return $user;
    }
}
