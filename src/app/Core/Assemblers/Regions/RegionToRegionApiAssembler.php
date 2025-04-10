<?php

namespace App\Core\Assemblers\Regions;

use App\Core\Assemblers\Regions\RegionToRegionApiAssemblerInterface;
use App\Core\Dto\Api\RegionDto;
use App\Models\Region;

class RegionToRegionApiAssembler implements RegionToRegionApiAssemblerInterface
{

    public function assemble(Region $region): RegionDto
    {
        $dto = new RegionDto();
        $dto->id = $region->id;
        $dto->name = $region->name;
        return $dto;
    }
}
