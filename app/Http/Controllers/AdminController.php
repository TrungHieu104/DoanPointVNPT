<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoQuan;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public $user;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $cq = CoQuan::find($this->user->id_CQ);
            view()->share([
                'cq' => $cq,
            ]);
            return $next($request);
        });
    }
    //
    function index(){
        return view("admin.home");
    }
    // function index(){
    //     $user = Auth::user();
    //     $cq = CoQuan::find($user->id_CQ);
    //     // $cq = CoQuan::find(session('cq'));
    //     return view("admin.home",compact('cq'));
    // }
}
