<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class IndenxInterview
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
        $user=Cache::get('index_user');
        //判断session没有值跳到登录页
        if(!$user){
            return redirect('interview/index_login');
        }
        return $next($request);
    }
}
