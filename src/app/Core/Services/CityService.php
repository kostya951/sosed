<?php

namespace App\Core\Services;

use App\Core\Assemblers\Cities\CityToCityApiAssemblerInterface;
use App\Core\Services\CityServiceInterface;
use App\Models\City;

class CityService implements CityServiceInterface
{

    private CityToCityApiAssemblerInterface $assembler;

    public function __construct(CityToCityApiAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function getRegionCities($regionId): array
    {
        $result = [];

        $cities = City::where('region_id', $regionId)
            ->where('publish',true)
            ->get()
            ->all();

        foreach ($cities as $city) {
            $result[] = $this->assembler->assemble($city);
        }

        return $result;
    }
}
