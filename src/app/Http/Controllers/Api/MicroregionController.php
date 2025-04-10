<?php

namespace App\Http\Controllers\Api;

use App\Core\Services\MicroregionService;
use App\Http\Controllers\Controller;
use App\Models\City;

class MicroregionController extends Controller
{
    private MicroregionService $service;

    public function __construct(MicroregionService $service){
        $this->service = $service;
    }
    public function index(City $city){
        $microregions = $this->service->getCityMicroregions($city->id);
        return json_encode($microregions);
    }
}
