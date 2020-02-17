<?php

namespace App\Http\Controllers\Interview;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Interview\UserModel;
use Illuminate\Support\Facades\Cache;
use App\Model\Interview\InterviewModel;

class AdminController extends Controller
{
    /**
     * @content 后台登录
     */
    public function admin_login()
    {
        return view('interview.amdin_login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Laravel\Lumen\Http\Redirector|string|\think\response\Redirect|void
     * @content 登录执行
     */
    public function admin_login_do(Request $request)
    {
        $data = $request->all();
        $res = UserModel::where(['username'=>$data['username']])->first();
        if(!$res){
            return "<script>alert('请输入正确的用户名');history.go(-1);</script>";die;
        }else if($res['password']!=$data['password']){
            return "<script>alert('请输入正确的密码');history.go(-1);</script>";die;
        }else if ($res['status']!=1){
            return "<script>alert('您不是管理员，没有权限查看');history.go(-1);</script>";die;
        }
//        登录成功存缓存
        Cache::put('user_info',$res['username']);
        return redirect('interview/admin');
    }

    /**
     * 后台执行
     */
    public function admin()
    {
        $user = Cache::get('user_info');
        return view('interview.admin',['user'=>$user]);
    }
    /**
     * 添加学生
     */
    public function add_user()
    {
        return view('interview.add_user');
    }

    public function add_user_do(Request $request)
    {
        $data = $request->all();
        $status = 2;
        $res = UserModel::insert(['username'=>$data['username'],'password'=>$data['password'],'user_class'=>$data['user_class'],['status'=>$status]]);
        if($res){
            return redirect('interview/user_list');
        }
    }
    /**
     * 学生列表
     */
    public function user_list()
    {
        $data = UserModel::all()->toArray();
        return view('interview.user_list',['info'=>$data]);
    }
    /**
     * 学生面试信息
     */
    public function interview_info(Request $request)
    {
        $user_id = $request->get('user_id');
        //        根据用户id获取 用户面试详情
        $interview_info = InterviewModel::where(['user_id'=>$user_id])->get()->toArray();
        if($interview_info){
            return view('interview.interview_info',['info'=>$interview_info]);
        }else{
            echo "<script>alert('没有相关信息');</script>";
        }
    }
}
