<?php

namespace App\Core\Assemblers\Discussions;

use App\Core\Dto\DiscussionPageDto;
use Illuminate\Support\Collection;

class DiscussionsToDiscussionPageAssembler
  implements DiscussionsToDiscussionPageAssemblerInterface
{

    private DiscussionToDiscussionCardAssemblerInterface $assembler;

    public function __construct(DiscussionToDiscussionCardAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }

    public function assemble(Collection $discussions): DiscussionPageDto
    {
        $dto = new DiscussionPageDto();
        $discussionsDtoArray = [];

        foreach ($discussions as $discussion){
            $discussionsDtoArray[] = $this->assembler->assemble($discussion);
        }

        $dto->discussions = $discussionsDtoArray;
        return $dto;
    }

}
