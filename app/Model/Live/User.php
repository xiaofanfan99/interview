<?php

namespace App\Model\Live;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'live_user';//表名
    public $timestamps = false;//指示模型是否自动维护时间戳
    public $primaryKey='user_id';
}
