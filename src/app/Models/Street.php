<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;

    public $table = 'streets';

    public function microregion(){
        return $this->belongsTo(Microregion::class);
    }

    /**
     * Пользователь опубликовавший улицу
     */
    public function user(){
        return $this->belongsTo(User::class,'publish_user_id','id');
    }
}
