<?php

namespace App\Core\Assemblers\Regions;

use App\Core\Dto\Api\RegionDto;
use App\Models\Region;

interface RegionToRegionApiAssemblerInterface
{
    public function assemble(Region $region): RegionDto;
}
