<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $table = 'users';

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function ads(){
        return $this->hasMany(Ad::class);
    }

    public function articles(){
        return $this->hasMany(Article::class,'publish_user_id','id');
    }

    public function scopeCitizen($query){
        return $query->whereRelation('role','name','citizen');
    }

    public function scopeVerified($query){
        return $query->whereNotNull('email_verified_at');
    }

    public function scopeNotBlocked($query){
        return $query->whereNull('block_at');
    }

    public function scopeNotDeleted($query){
        return $query->whereNull('deleted_at');
    }
}
