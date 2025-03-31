<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastUserDto;
use App\Models\User;

class UserToLastUserAssembler implements UserToLastUserAssemblerInterface
{

     public const NO_PHOTO_PATH = '/img/nophoto.png';

    public function assemble(User $user): LastUserDto
    {
        $dto = new LastUserDto();
        $dto->name = $user->name;
        $dto->photo = empty($user->photo) ? self::NO_PHOTO_PATH : $user->photo;
        return $dto;
    }
}
