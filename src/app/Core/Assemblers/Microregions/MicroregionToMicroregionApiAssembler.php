<?php

namespace App\Core\Assemblers\Microregions;

use App\Core\Assemblers\Microregions\MicroregionToMicroregionApiAssemblerInterface;
use App\Core\Dto\Api\MicroregionDto;
use App\Models\Microregion;

class MicroregionToMicroregionApiAssembler implements MicroregionToMicroregionApiAssemblerInterface
{

    public function assemble(Microregion $microregion): MicroregionDto
    {
        $dto = new MicroregionDto();
        $dto->id = $microregion->id;
        $dto->name = $microregion->name;
        return $dto;
    }
}
