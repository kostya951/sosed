<?php

namespace App\Core\Assemblers\Discussions;

use App\Core\Dto\DiscussionCardDto;
use App\Models\Discussion;

class DiscussionToDiscussionCardAssembler
  implements DiscussionToDiscussionCardAssemblerInterface
{

    public function assemble(Discussion $discussion): DiscussionCardDto
    {
        $dto = new DiscussionCardDto();
        $dto->slug = $discussion->slug;
        $dto->date = $discussion->created_at;
        $dto->username = $discussion->user->name;
        $dto->title = $discussion->title;
        return $dto;
    }

}
