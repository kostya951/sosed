<?php

namespace App\Core\Assemblers\Discussions;

use App\Core\Dto\DiscussionDto;
use App\Models\Discussion;

interface DiscussionAssemblerInterface
{
    public function assemble(Discussion $discussion): DiscussionDto;
}
