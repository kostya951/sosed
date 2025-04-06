<?php

namespace App\Core\Dto;

class DiscussionPageDto
{
    public int $totalDiscussions;
    public string $links;

    /**
     * @var DiscussionCardDto[]
     */
    public array $discussions;
}
