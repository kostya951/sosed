<?php

namespace App\Core\Services;

interface CountryServiceInterface
{

    /**
     * @return \App\Core\Dto\Api\CountryDto[]
     */
    public function getAllCountries(): array;
}
