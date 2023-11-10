<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\CoQuan;

class CheckParentCQ
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = CoQuan::where('id_CQ', Auth::user()->id_CQ)->value('parent_CQ');
        if ($check == 0) {
            return $next($request);
        } else return redirect('/notif')->with('thongbao', "Bạn không đủ quyền hạn để truy cập site này");

    }
}
