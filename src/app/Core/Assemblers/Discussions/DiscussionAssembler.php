<?php

namespace App\Core\Assemblers\Discussions;

use App\Core\Dto\DiscussionDto;
use App\Core\Traits\HasNoPhoto;
use App\Models\Discussion;

class DiscussionAssembler implements DiscussionAssemblerInterface
{

    use HasNoPhoto;

    public function assemble(Discussion $discussion): DiscussionDto
    {
        $dto = new DiscussionDto();
        $dto->userSlug = $discussion->user->slug;
        $dto->username = $discussion->user->name;
        $dto->date = $discussion->created_at;
        $dto->title = $discussion->title;
        $dto->photo = empty($discussion->photo) ? $this->noPhotoPath : $discussion->photo;
        $dto->body = $discussion->body;
        $dto->see = $discussion->see ?? 0;
        $dto->answer = $discussion->answer ?? '';

        $user = $discussion->user;
        $apartment = $user->apartments->first();
        $street = $apartment->street;
        $microregion = $street->microregion;
        $city = $microregion->city;

        $dto->address=sprintf("г. %s, р-н %s, ул. %s, дом %s",
            $city->name,
            $microregion->name,
            $street->name,
            $apartment->dom
        );

        return $dto;
    }

}
