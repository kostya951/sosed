<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model implements ICommentable, Sitemapable
{
    public $table = 'news';
}
