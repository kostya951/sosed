<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastUserDto;
use App\Models\User;

interface UserToLastUserAssemblerInterface
{
    public function assemble(User $user): LastUserDto;
}
