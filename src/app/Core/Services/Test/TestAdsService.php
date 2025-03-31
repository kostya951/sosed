<?php

namespace App\Core\Services\Test;

use App\Core\Dto\LastAdsDto;
use App\Core\Traits\HasNoPhoto;

class TestAdsService implements \App\Core\Services\AdsServiceInterface
{
    use HasNoPhoto;

    /**
     * @inheritDoc
     */
    public function getLastAds(int $count = 9): array
    {
        $result = [];

        for($i=0;$i<$count;$i++){
            $dto = new LastAdsDto();
            $dto->price = 1000;
            $dto->category = 'Category '.$i;
            $dto->date = '2025-05-25 16:30';
            $dto->photo = $this->noPhotoPath;
            $dto->title = 'Title '.$i;
            $result[] = $dto;
        }

        return $result;
    }
}
