<?php

namespace App\Core\Assemblers;

use App\Core\Dto\LastAdsDto;
use App\Models\Ad;

interface AdsToLastAdsAssemblerInterface
{
    public function assemble(Ad $ad):LastAdsDto;
}
