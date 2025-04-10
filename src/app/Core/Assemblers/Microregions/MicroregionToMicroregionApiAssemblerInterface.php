<?php

namespace App\Core\Assemblers\Microregions;

use App\Core\Dto\Api\MicroregionDto;
use App\Models\Microregion;

interface MicroregionToMicroregionApiAssemblerInterface
{
    public function assemble(Microregion $microregion):MicroregionDto;
}
