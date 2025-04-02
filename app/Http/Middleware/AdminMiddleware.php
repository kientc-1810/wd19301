<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // check về xác thực xem đã đăng nhập chưa
        if(!Auth::check()){
            return redirect('/login');
        }
        // check về phân quyền xem có đúng quyền admin hay không
        if(Auth::user()->role !== 'admin'){
            return redirect('/list')->with('error','Bạn không đủ quyền truy cập');
        }
        return $next($request);
    }
}
