<?php

namespace App\Core\Assemblers\Discussions;

use App\Core\Dto\DiscussionPageDto;
use Illuminate\Support\Collection;

interface DiscussionsToDiscussionPageAssemblerInterface
{
    public function assemble(Collection $discussions): DiscussionPageDto;
}
