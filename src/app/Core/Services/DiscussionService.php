<?php

namespace App\Core\Services;

use App\Core\Assemblers\Discussions\DiscussionsToDiscussionPageAssemblerInterface;
use App\Core\Dto\DiscussionPageDto;
use App\Models\Discussion;

class DiscussionService implements DiscussionServiceInterface
{

    private DiscussionsToDiscussionPageAssemblerInterface $pageAssembler;

    public function __construct(DiscussionsToDiscussionPageAssemblerInterface $pageAssembler){
        $this->pageAssembler = $pageAssembler;
    }

    public function getAllDiscusions($count = 10): DiscussionPageDto
    {
        $discussions = Discussion::query()->orderByDesc('created_at');
        $discussions = $discussions->paginate($count);

        $dto = $this->pageAssembler->assemble($discussions->getCollection());

        $total = $discussions->total();
        $links = $discussions->links();

        $dto->totalDiscussions = $total;
        $dto->links =$links;

        return $dto;
    }

}
