<?php

namespace App\Core\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getUserById(int $id): ?User
    {
        return User::where('id',$id)
            ->notBlocked()
            ->notDeleted();
    }

    /**
     * @inheritDoc
     */
    public function getUserByEmail(string $email): ?User
    {
        return User::where('email',$email)
            ->notBlocked()
            ->notDeleted();
    }

    /**
     * @inheritDoc
     */
    public function getUserByIdAll(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getUserByEmailAll(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
