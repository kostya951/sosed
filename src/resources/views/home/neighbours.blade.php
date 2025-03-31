<?php
    /**
     * @var \App\Core\Dto\LastUserDto[] $users
     */
?>
<h1 class="text-center">Твои соседи уже здесь!</h1>
<div class="col-md-12">
    <div class="row">
        @forelse($users as $user)
            <div class="col-2">
                <x-usercard userPhotoPath="{{ $user->photo }}" userName="{{ $user->name }}"></x-usercard>
            </div>
        @empty
            <div class="col-12 text-center">
                Нету пользователей ещё! Будьте первым!
            </div>
        @endforelse
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-3 text-center">
            <a class="btn btn-primary" href="#">Посмотреть всех</a>
        </div>
    </div>
</div>
