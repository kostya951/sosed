<?php

namespace App\Core\Services;

use App\Core\Assemblers\Discussions\DiscussionsToDiscussionPageAssemblerInterface;
use App\Core\Dto\DiscussionPageDto;
use App\Core\Filters\Filter;
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

    /**
     * @inheritDoc
     */
    public function filterDiscussions(
        array $filterFields,
        int $count = 10,
    ): DiscussionPageDto {

        $discussions = Discussion::filter($filterFields);
        $discussions = $discussions->paginate($count);
        $totalDiscussions = $discussions->total();

        $dto = $this->pageAssembler->assemble($discussions->getCollection());

        $dto->totalDiscussions = $totalDiscussions;
        $dto->links = $discussions->links();

        return $dto;
    }

    /**
     * @inheritDoc
     */
    public function searchDiscussions(string $query,int $count=10)
    {
        $discussions = Discussion::search($query);
        $discussions = $discussions->paginate($count);
        $totalDiscussions = $discussions->total();

        $dto = $this->pageAssembler->assemble($discussions->getCollection());

        $dto->totalDiscussions = $totalDiscussions;
        $dto->links = $discussions->links();

        return $dto;
    }

}
