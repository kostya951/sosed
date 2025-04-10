<?php

namespace App\Core\Services;

use App\Core\Assemblers\Microregions\MicroregionToMicroregionApiAssemblerInterface;
use App\Models\Microregion;

class MicroregionService implements MicroregionServiceInterface
{

    private MicroregionToMicroregionApiAssemblerInterface $assembler;


    public function __construct(MicroregionToMicroregionApiAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }
    /**
     * @inheritDoc
     */
    public function getCityMicroregions($cityId): array
    {
        $result = [];

        $microregions = Microregion::where('city_id', $cityId)
            ->where('publish',true)
            ->get()
            ->all();

        foreach ($microregions as $microregion) {
            $result[] = $this->assembler->assemble($microregion);
        }

        return $result;
    }
}
