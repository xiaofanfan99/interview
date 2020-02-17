<?php

namespace App\Model\News;

use Illuminate\Database\Eloquent\Model;

class News_account extends Model
{
    protected $table = 'news_account';
    public $timestamps = false;
    protected $primaryKey = 'account_id';
}
