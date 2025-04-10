<?php

namespace App\Http\Controllers\Api;

use App\Core\Services\RegionServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Country;
use function json_encode;

class RegionController extends Controller
{
    private RegionServiceInterface $regionService;

    public function __construct(RegionServiceInterface $regionService){
        $this->regionService = $regionService;
    }

    public function index(Country $country){
        $regions = $this->regionService->getCountryRegions($country->id);
        return json_encode($regions);
    }
}
