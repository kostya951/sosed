<?php

namespace App\Core\Services;

use App\Core\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecurityService implements SecurityServiceInterface
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function login(string $email, string $password): bool
    {
        $user = $this->userRepository->getUserByEmail($email);
        if(!isset($user)) return false;
        if($user->getAuthPassword() !== Hash::make($password)) return false;

        auth()->login($user);
        return true;
    }

    /**
     * @inheritDoc
     */
    public function logout(): bool
    {
        auth()->logout();
        return true;
    }
}
