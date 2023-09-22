<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // if(auth()->check()){
        //     if(auth()->user()->role == $role){
        //         return $next($request);
        //     }else{
        //         // if(auth()->user()->role == 1) {
        //         //     return $next($request);
        //         // } else {
        //             return redirect('/notif')->with('thongbao', "Bạn không đủ quyền hạn để truy cập site này");
        //         // }
        //     }
        // }else{
        //     return redirect('/login');
        // }

        if (Auth::check()) {
            if (Auth::user()->role == $role) {
                return $next($request);
            } else {
                return redirect('/notif')->with('thongbao', "Bạn không đủ quyền hạn để truy cập site này");
            }
        } else {
            return redirect('/login');
        }


        


    }
}
