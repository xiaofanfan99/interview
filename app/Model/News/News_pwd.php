<?php

namespace App\Model\News;

use Illuminate\Database\Eloquent\Model;

class News_pwd extends Model
{
    protected $table = 'news_pwd';
    public $timestamps = false;
    protected $primaryKey = 'user_id';
}
