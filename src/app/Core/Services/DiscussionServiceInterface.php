<?php

namespace App\Core\Services;

use App\Core\Dto\DiscussionPageDto;

interface DiscussionServiceInterface
{
    public function getAllDiscusions($count=10): DiscussionPageDto;

    /**
     * @param array $filterFields все паараметры из запроса для фильтрации
     * @param int $count - количество на страницу
     *
     * @return DiscussionPageDto
     */
    public function filterDiscussions(array $filterFields,int $count = 10):DiscussionPageDto;

    /**
     * @param string $query
     * @return mixed
     */
    public function searchDiscussions(string $query,int $count = 10);
}
