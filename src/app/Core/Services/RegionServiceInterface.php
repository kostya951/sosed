<?php

namespace App\Core\Services;

use App\Core\Dto\Api\RegionDto;

interface RegionServiceInterface
{
    /**
     * @param $countryId
     * @return RegionDto[]
     */
    public function getCountryRegions($countryId): array;
}
