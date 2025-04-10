<?php

namespace App\Core\Services;

use App\Core\Assemblers\Regions\RegionToRegionApiAssembler;
use App\Core\Services\RegionServiceInterface;
use App\Models\Region;

class RegionService implements RegionServiceInterface
{
    private RegionToRegionApiAssembler $apiAssembler;

    public function __construct(RegionToRegionApiAssembler $apiAssembler){
        $this->apiAssembler = $apiAssembler;
    }

    /**
     * @inheritDoc
     */
    public function getCountryRegions($countryId): array
    {
        $result = [];

        $regions = Region::where('country_id', $countryId)->get()->all();

        foreach ($regions as $region) {
            $result[] = $this->apiAssembler->assemble($region);
        }

        return $result;
    }
}
