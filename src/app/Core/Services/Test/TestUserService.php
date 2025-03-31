<?php

namespace App\Core\Services\Test;

use App\Core\Dto\LastUserDto;
use App\Core\Services\UserServiceInterface;


class TestUserService implements UserServiceInterface
{

    /**
     * @inheritDoc
     */
    public function getLastUsers(int $count = 9): array
    {
        $result = [];

        for($i=0;$i<$count;$i++){
            $user =  new LastUserDto();
            $user->name = 'TestName '.$i;
            $user->photo = '/img/nophoto.png';
            $result[] = $user;
        }

        return $result;
    }
}
