<?php

namespace App\Core\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Получить юзера по айди не заблокированного и не удалённого
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id): ?User;

    /**
     * Получить юзера по имейлу не заблокированного и не удалённого
     * @param string $email
     * @return User|null
     */
    public function getUserByEmail(string $email): ?User;

    /**
     * Получить юзера по айди из хранилища без ограничений
     * @param int $id
     * @return User|null
     */
    public function getUserByIdAll(int $id): ?User;

    /**
     * Получить юзера по имейлу из хранилища без органичений
     * @param string $email
     * @return User|null
     */
    public function getUserByEmailAll(string  $email): ?User;
}
