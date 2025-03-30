<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(ArticleCategory::class,'id','category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id','publish_user_id');
    }
}
