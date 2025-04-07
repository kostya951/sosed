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

    public function street(){
        return $this->belongsTo(Street::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'apartments_users','apartment_id','user_id');
    }

    public function discussions(){
        return $this->hasMany(Discussion::class);
    }
}
