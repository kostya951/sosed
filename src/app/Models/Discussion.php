<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Discussion extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;
    use Filterable;

    public $table = 'discussions';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
              ->generateSlugsFrom(['id','title'])
              ->saveSlugsTo('slug')
              ->doNotGenerateSlugsOnUpdate();
    }

    public function searchableAs()
    {
        return 'discussions_index';
    }

    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
