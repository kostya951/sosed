<?php

namespace App\Core\Assemblers\Discussions;

use App\Core\Dto\DiscussionCardDto;
use App\Models\Discussion;

interface DiscussionToDiscussionCardAssemblerInterface
{
    public function assemble(Discussion $discussion): DiscussionCardDto;
}
