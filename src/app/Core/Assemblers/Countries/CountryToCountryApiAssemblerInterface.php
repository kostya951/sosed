<?php

namespace App\Core\Assemblers\Countries;

use App\Core\Dto\Api\CountryDto;
use App\Models\Country;

interface CountryToCountryApiAssemblerInterface
{
    public function assemble(Country $country): CountryDto;
}
