<?php

namespace App\Core\Services;

use App\Core\Assemblers\Countries\CountryToCountryApiAssemblerInterface;
use App\Models\Country;

class CountryService implements CountryServiceInterface
{

    private CountryToCountryApiAssemblerInterface $assembler;

    public function __construct(CountryToCountryApiAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function getAllCountries(): array
    {
        $result = [];

        $countries = Country::all();
        foreach ($countries as $country){
            $result[] = $this->assembler->assemble($country);
        }

        return $result;
    }

}
