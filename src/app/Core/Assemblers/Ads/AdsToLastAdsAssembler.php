<?php

namespace App\Core\Assemblers\Ads;

use App\Core\Dto\LastAdsDto;
use App\Core\Traits\HasNoPhoto;
use App\Models\Ad;

class AdsToLastAdsAssembler implements AdsToLastAdsAssemblerInterface
{
    use HasNoPhoto;

    public function assemble(Ad $ad): LastAdsDto
    {
        $dto = new LastAdsDto();
        $dto->title = $ad->title;
        $dto->photo = empty($ad->photo) ? $this->noPhotoPath : $ad->photo;
        $dto->date = $ad->created_at;
        $dto->category = $ad->category->title;
        $dto->price = $ad->price;

        return $dto;
    }
}
