<?php

namespace App\Core\Services;

use App\Core\Assemblers\Ads\AdsToLastAdsAssemblerInterface;
use App\Models\Ad;

class AdsService implements AdsServiceInterface
{

    private AdsToLastAdsAssemblerInterface $assembler;

    public function __construct(AdsToLastAdsAssemblerInterface $assembler){
        $this->assembler = $assembler;
    }

    /**
     * @inheritDoc
     */
    public function getLastAds(int $count = 9): array
    {
        $ads = Ad::query()
            ->orderByDesc('created_at')
            ->limit($count)
            ->get();

        $result = [];
        foreach ($ads as $ad){
            $result[] = $this->assembler->assemble($ad);
        }

        return $result;
    }
}
