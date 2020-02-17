<?php

namespace App\Http\Middleware;

use Closure;

class NewsLogin
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
        $user=session('news_user');
        //判断session没有值跳到登录页
        if(!$user){
            return redirect('news/login');
        }
        return $next($request);
    }
}
