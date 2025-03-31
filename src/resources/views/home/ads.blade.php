<?php
    /**
     * @var \App\Core\Dto\LastAdsDto[] $ads
     */
?>
<h1 class="text-center">Новые объявления!</h1>
<div class="col-md-12">
    <div class="row">
        @forelse($ads as $ad)
            <div class="col-2">
                <x-adscard
                    title="{{$ad->title}}"
                    photo="{{$ad->photo}}"
                    category="{{$ad->category}}"
                    date="{{$ad->date}}"
                    price="{{$ad->price}}"
                ></x-adscard>
            </div>
        @empty
            <div class="col-12 text-center">
                Нету объявлений ещё! Будьте первым!
            </div>
        @endforelse
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-3 text-center">
            <a class="btn btn-primary" href="#">Посмотреть все объявления</a>
        </div>
    </div>
</div>
