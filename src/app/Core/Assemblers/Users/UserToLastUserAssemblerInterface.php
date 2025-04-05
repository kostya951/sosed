<?php

namespace App\Core\Assemblers\Users;

use App\Core\Dto\LastUserDto;
use App\Models\User;

interface UserToLastUserAssemblerInterface
{
    public function assemble(User $user): LastUserDto;
}
