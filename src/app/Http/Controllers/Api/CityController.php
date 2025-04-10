<?php

namespace App\Http\Controllers\Api;

use App\Core\Services\CityServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Region;

class CityController extends Controller
{
    private CityServiceInterface $service;

    public function __construct(CityServiceInterface $service){
        $this->service = $service;
    }
    public function index(Region $region)
    {
        $cities = $this->service->getRegionCities($region->id);
        return json_encode($cities);
    }
}
