<?php

namespace App\Http\Controllers\News;

use app\index\controller\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News\News_account;
use App\Model\News\News_pwd;
use App\Model\News\News_add;
use DB;
use Illuminate\Support\Facades\Cache;

class indexController extends Controller
{
    /*
     * 登录页
     */
    public function login()
    {
        return  view('news.login');
    }

    /**
     * 登录执行
     */
    public function login_do(Request $request)
    {
        $data = $request->all();
        $account_data = News_account::where(['account_name'=>$data['account_name']])->first();
//        dd($account_data);
        if($account_data){
            //查询密码表
            $pwd = News_pwd::where(['user_id'=>$account_data['pwd_id']])->first()->ToArray();
//            dd($pwd);
            if($pwd) {
                if($pwd['user_pwd']==$data['pwd_id']){
                    session(['news_user'=>['name'=>$account_data['account_name'],'user_id'=>$pwd['user_id'],'user_tel'=>$pwd['user_tel']]]);
                    return redirect('news/index');
                }else{
                    Cache::put('pwd',1);
                    echo "<script>alert('密码存在错误');history.go(-1);</script>";
                }
            }
        }else{
            echo "<script>alert('账号不存在，请核实后再操作');history.go(-1);</script>";
        }
    }

    /**
     *新闻主页
     */
    public function index()
    {
        return view('news.index');
    }

    /**
     * 新闻添加
     */
    public function news_add()
    {
        return view('news.news_add');
    }

    /**
     * 新闻添加执行
     */
    public function news_add_do(Request $request)
    {
        $title = $request->all();
        if($title['timing_time']==''){
            $title['timing_time']=date('Y-m-d');
        }
        $res = DB::table('news_add')->insert([
            'title'=>$title['title'],
            'content'=>$title['content'],
            'release'=>$title['release'],
            'timing_time'=>$title['timing_time'],
            'user_tel'=>session('news_user')['user_tel']
        ]);
        if($res){
            return json_encode(['code'=>200,'msg'=>'发布成功']);
        }
    }

    /**
     * 新闻列表
     */
    public function news_list()
    {
        $data = date('Y-m-d');
        $news_data = News_add::where('timing_time','<=',$data)->orderby('timing_time','desc')->get();
        foreach ($news_data as $k=>$v){
            $str1 = substr($v['user_tel'],0,3);
            $str2 = substr($v['user_tel'],7,4);
            $news_data[$k]['user_tel'] = $str1."****".$str2;
        }
        return view('news.news_list',['data'=>$news_data]);
    }
}
