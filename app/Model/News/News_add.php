<?php

namespace App\Model\News;

use Illuminate\Database\Eloquent\Model;

class News_add extends Model
{
    protected $table = 'news_add';
    public $timestamps = false;
    protected $primaryKey = 'news_id';
}
