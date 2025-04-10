<?php

namespace App\Core\Assemblers\Countries;

use App\Core\Dto\Api\CountryDto;
use App\Models\Country;

class CountryToCountryApiAssembler implements CountryToCountryApiAssemblerInterface
{

    public function assemble(Country $country): CountryDto
    {
        $dto = new CountryDto();
        $dto->id = $country->id;
        $dto->name = $country->name;
        return $dto;
    }

}
