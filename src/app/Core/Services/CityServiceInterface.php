<?php

namespace App\Core\Services;

use App\Core\Dto\Api\CityDto;
use App\Models\City;

interface CityServiceInterface
{
    /**
     * @param $regionId
     * @return CityDto[]
     */
    public function getRegionCities($regionId): array;
}
