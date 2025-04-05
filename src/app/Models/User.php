<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use HasSlug;
    use Notifiable;

    public $table = 'users';
    public $hidden = [
        'password',
        'remember_token'
    ];
    public $fillable = [
        'password',
        'email',
        'birthday',
        'role_id',
        'sex',
        'name'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['id','name'])
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function ads(){
        return $this->hasMany(Ad::class);
    }

    public function articles(){
        return $this->hasMany(Article::class,'publish_user_id','id');
    }

    public function apartments(){
        return $this->belongsToMany(Apartment::class,'apartments_users','user_id','apartment_id');
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
