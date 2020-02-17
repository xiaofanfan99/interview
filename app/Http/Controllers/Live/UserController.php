<?php

namespace App\Http\Controllers\Live;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Live\User;

class UserController extends Controller
{
    /**
     *篮球直播首页
     */
    public function index()
    {
        return view('live.index');
    }

    /**
     * 登录
     */
    public function login()
    {
        return view('live.login');
    }

    /**
     * 登录执行
     */
    public function login_do(Request $request)
    {
        $data = $request->all();
        $user_data = User::where(['username'=>$data['username']])->first()->toArray();
        if($user_data){
            //用户名存在判断密码是否正确
            if($data['password']!=$user_data['password']){
                //密码不正确
                echo "<script>alert('密码错误');history.go(-1);</script>";die;
            }else{
                return redirect('live/index');
            }
        }else{
            //用户名不正确提示
            echo "<script>alert('用户名不存在');history.go(-1);</script>";die;
        }
    }

    /**
     * 添加球队比赛
     */
    public function add_match()
    {
        return view('live.add_match');
    }
}
