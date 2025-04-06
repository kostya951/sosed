<?php

namespace App\Core\Services;

use App\Core\Dto\DiscussionPageDto;

interface DiscussionServiceInterface
{
    public function getAllDiscusions($count=10): DiscussionPageDto;
}
