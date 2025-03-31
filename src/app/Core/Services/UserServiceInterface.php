<?php

namespace App\Core\Services;

use App\Core\Dto\LastUserDto;

interface UserServiceInterface
{
    /**
     * Получить последних юзеров для главной страницы
     * @param int $count количество юзеров
     * @return LastUserDto[]
     */
    public function getLastUsers(int $count = 9): array;
}
