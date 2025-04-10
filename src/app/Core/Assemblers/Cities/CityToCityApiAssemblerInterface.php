<?php

namespace App\Core\Assemblers\Cities;

use App\Core\Dto\Api\CityDto;
use App\Models\City;

interface CityToCityApiAssemblerInterface
{
    public function assemble(City $city): CityDto;
}
