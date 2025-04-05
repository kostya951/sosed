<?php

namespace App\Core\Services;

use App\Core\Assemblers\Users\UserToLastUserAssemblerInterface;
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
        foreach ($users as $user){
            $result[] = $this->assembler->assemble($user);
        }

        return $result;
    }
}
