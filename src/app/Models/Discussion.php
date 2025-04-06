<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Discussion extends Model
{
    use HasFactory;
    use HasSlug;

    public $table = 'discussions';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
              ->generateSlugsFrom(['id','title'])
              ->saveSlugsTo('slug')
              ->doNotGenerateSlugsOnUpdate();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
