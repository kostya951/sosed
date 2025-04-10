<?php

namespace App\Http\Controllers\Api;

use App\Core\Services\CountryServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function json_encode;

class CountryController extends Controller
{
    private CountryServiceInterface $service;

    public function __construct(CountryServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $countries = $this->service->getAllCountries();
        return json_encode($countries);
    }
}
