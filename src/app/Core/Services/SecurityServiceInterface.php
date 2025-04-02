<?php

namespace App\Core\Services;

use App\Models\User;

interface SecurityServiceInterface
{
    /**
     * @param string $email
     * @param string $string
     * @return bool
     */
    public function login(string $email,string $password) : bool;

    /**
     * @param int $userId
     * @return bool
     */
    public function logout() : bool;
}
