<?php

namespace App\Core\Services;

use App\Core\Dto\Api\MicroregionDto;

interface MicroregionServiceInterface
{
    /**
     * @param $cityId
     * @return MicroregionDto[]
     */
    public function getCityMicroregions($cityId): array;
}
