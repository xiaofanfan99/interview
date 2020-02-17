<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;


class InterviewLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //模拟session登录
        $user=Cache::get('user_info');
        //判断session没有值跳到登录页
        if(!$user){
            return redirect('interview/admin_login');
        }
        return $next($request);
    }
}
