<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';

    public function category(){
        return $this->belongsTo(ArticleCategory::class,'category_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'publish_user_id','id');
    }
}
