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

    public function scopeCitizen(){
        return User::whereRelation('role','name','admin');
    }

    public function scopeVerified(){
        return User::whereNotNull('email_verified_at');
    }

    public function scopeNotBlocked(){
        return User::whereNull('block_at');
    }

    public function scopeNotDeleted(){
        return User::whereNull('deleted_at');
    }
}
