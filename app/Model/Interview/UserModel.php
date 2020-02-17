<?php

namespace App\Model\Interview;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //链接外部数据库
    protected $connection = 'interview_mysql';
    protected $table = 'user';//表名
    public $primaryKey='user_id';
    public $timestamps = false;//指示模型是否自动维护时间戳
}
