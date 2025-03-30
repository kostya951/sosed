<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    public $table = 'roles';
    public $timestamps = false;
    public $fillable = ['id','name','label'];
}
