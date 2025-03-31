<?php

namespace App\Core\Services;

use App\Core\Assemblers\UserToLastUserAssembler;
use App\Core\Assemblers\UserToLastUserAssemblerInterface;
use App\Core\Dto\LastUserDto;
use App\Models\User;

class UserService implements UserServiceInterface
{
    private UserToLastUserAssemblerInterface $assembler;

    public function __construct(UserToLastUserAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function getLastUsers(int $count = 9): array
    {
        $users = User::citizen()
                ->verified()
                ->notBlocked()
                ->notDeleted()
                ->orderByDesc('created_at')
                ->limit($count)
                ->get();

        $result = [];
        $users->each(function (User $user) use ($result){
            $result[] = $this->assembler->assemble($user);
        });

        return $result;
    }
}
