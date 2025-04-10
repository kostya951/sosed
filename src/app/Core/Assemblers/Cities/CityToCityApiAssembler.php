<?php

namespace App\Core\Assemblers\Cities;

use App\Core\Assemblers\Cities\CityToCityApiAssemblerInterface;
use App\Core\Dto\Api\CityDto;
use App\Models\City;

class CityToCityApiAssembler implements CityToCityApiAssemblerInterface
{

    public function assemble(City $city): CityDto
    {
        $dto = new CityDto();
        $dto->name = $city->name;
        $dto->id = $city->id;
        return $dto;
    }
}
