<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Microregion extends Model
{
    use HasFactory;
    use HasSlug;

    public $table = 'microregions';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
                  ->generateSlugsFrom(['id','name'])
                  ->saveSlugsTo('slug')
                  ->doNotGenerateSlugsOnUpdate();
    }

    public function streets(){
        return $this->hasMany(Street::class);
    }

    public function apartments(){
        return $this->hasMany(Apartment::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    /**
     * Пользователь опубликовавший микрорайон
     */
    public function user(){
        return $this->belongsTo(User::class,'publish_user_id','id');
    }

}
