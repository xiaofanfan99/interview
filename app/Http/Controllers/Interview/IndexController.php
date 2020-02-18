<?php

namespace App\Http\Controllers\Interview;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Interview\UserModel;
use Qiniu\Auth;
use Illuminate\Support\Facades\Storage;
use App\Model\Interview\InterviewModel;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * 前台登录
     */
    public function index_login()
    {
           return view('interview/index_login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Laravel\Lumen\Http\Redirector|string|\think\response\Redirect|void
     * @content 登录执行
     */
    public function index_login_do(Request $request)
    {
        $data = $request->all();
        $res = UserModel::where(['username'=>$data['username']])->first();
        if(!$res){
            return "<script>alert('姓名有误');history.go(-1);</script>";die;
        }else if($data['password']!=$res['password']){
            return "<script>alert('密码有误');history.go(-1);</script>";die;
        }
        Cache::put('index_user',$res);
        return redirect('interview/add_interview');
    }

    /**
     * @content 添加面试录音
     */
    public function add_interview()
    {
        return view('interview.add_interview');
    }

    /**
     * @content 添加面试录音执行页面
     */
    public function add_interview_do(Request $request)
    {
        $data = $request->all();
        $file = $request->file('interview');
        // 此时 $this->upload如果成功就返回文件名不成功返回false
        $fileName = $this->upload($file);
        if ($fileName){
            $interview =  $fileName;
        }else{
            return '面试题上传失败';die;
        }
        //在缓存中获取登录用户 根据用户查id
        $user_data = Cache::get('index_user');
        $user_id = $user_data['user_id'];
//        添加面试信息到数据库
        $res = InterviewModel::insert(['interview'=>$interview,'user_id'=>$user_id,'interview_status'=>$data['interview_status'],'address'=>$data['address'],'company'=>$data['company'],'interview_time'=>$data['interview_time']]);
        if($res){
            return redirect('interview/student_interview_info');
        }else{
            return "<script>alert('添加面试信息有误');history.go(-1);</script>";die;
        }
    }

    /**
     * 用户的面试详情列表
     */
    public function student_interview_info()
    {
        //在缓存中获取登录用户 根据用户查id
        $user_data = Cache::get('index_user');
        $user_id = $user_data['user_id'];
//        根据用户id获取 用户面试详情
        $interview_info = InterviewModel::where(['user_id'=>$user_id])->get()->toArray();
        if($interview_info){
            return view('interview.student_interview_info',['info'=>$interview_info]);
        }else{
            echo "<script>alert('没有相关信息');</script>";
        }
    }
    /**
     * 删除面试资料
     */
    public function interview_del(Request $request)
    {
        $interview_id = $request->get('interview_id');
        $res = InterviewModel::where(['interview_id'=>$interview_id])->delete();
        if($res){
            return redirect('interview/student_interview_info');
        }else{
            echo "<script>alert('删除失败');history.go(-1);</script>";die;
        }
    }



    /**
     * 验证文件是否合法
     */
    public function upload($file, $disk='public') {
        // 1.是否上传成功
        if (! $file->isValid()) {
            return false;
        }
        // 2.是否符合文件类型 getClientOriginalExtension 获得文件后缀名
        $fileExtension = $file->getClientOriginalExtension();
//        if(! in_array($fileExtension, ['png', 'jpg', 'gif'])) {
//            return false;
//        }
        // 3.判断大小是否符合 2M
        $tmpFile = $file->getRealPath();
//        if (filesize($tmpFile) >= 2048000) {
//            return false;
//        }
        // 4.是否是通过http请求表单提交的文件
//        if (! is_uploaded_file($tmpFile)) {
//            return false;
//        }
        // 5.每天一个文件夹,分开存储, 生成一个随机文件名
        $fileName = md5(time()) .mt_rand(0,9999).'.'. $fileExtension;
        if (Storage::disk($disk)->put($fileName, file_get_contents($tmpFile)) ){
            return Storage::url($fileName);
        }
    }

}
