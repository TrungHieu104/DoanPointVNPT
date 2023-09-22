<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoQuan;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    function index(){
        $user = Auth::user();
        $cq = CoQuan::find($user->id_CQ);
        // $cq = CoQuan::find(session('cq'));
        return view("admin.home",compact('cq'));
    }
}
