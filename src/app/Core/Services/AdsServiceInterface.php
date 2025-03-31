<?php

namespace App\Core\Services;

use App\Core\Dto\LastAdsDto;

interface AdsServiceInterface
{
    /**
     * Получить последние объявления
     * @param int $count количество объявлений
     * @return LastAdsDto[]
     */
    public function getLastAds(int $count = 9): array;
}
