<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoQuan;
use Illuminate\Support\Facades\Auth;

class ThongKeController extends AdminController
{
    //
    protected function sortCQ(){
        $cq = CoQuan::where('id_CQ', Auth::user()->id_CQ);
    }
}
