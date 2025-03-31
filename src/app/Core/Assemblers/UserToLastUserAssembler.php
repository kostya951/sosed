<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastUserDto;
use App\Core\Traits\HasNoPhoto;
use App\Models\User;

class UserToLastUserAssembler implements UserToLastUserAssemblerInterface
{

     use HasNoPhoto;

    public function assemble(User $user): LastUserDto
    {
        $dto = new LastUserDto();
        $dto->name = $user->name;
        $dto->photo = empty($user->photo) ? $this->noPhotoPath : $user->photo;
        return $dto;
    }
}
