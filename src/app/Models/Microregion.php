<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microregion extends Model
{
    use HasFactory;

    public $table = 'microregions';

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
