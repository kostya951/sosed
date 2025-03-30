<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public $table = 'apartments';

    public function ads(){
        return $this->hasMany(Ad::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function street(){
        return $this->belongsTo(Street::class);
    }

    public function microregion(){
        return $this->belongsTo(Microregion::class);
    }
}
