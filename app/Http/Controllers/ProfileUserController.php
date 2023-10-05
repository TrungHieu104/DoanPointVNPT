<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CoQuan;
use App\Models\LoaiDanhGia;
use App\Models\thang;
use App\Models\quy;
use App\Models\nam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileUserController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $cq = CoQuan::find($this->user->id_CQ);
            $thang = thang::all();
            $quy = quy::all();
            $nam = nam::all();
            view()->share([
                'cq' => $cq,
                'thang' => $thang,
                'quy' => $quy,
                'nam' => $nam,
            ]);
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataCQ = CoQuan::all();
        $dataLDG = LoaiDanhGia::all();
        return view("user.home", [
            'dataCQ' => $dataCQ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateProfile(Request $request)
    {
        $isSuccess = false;
        $dataCQ = CoQuan::all();
        $user = User::where('id', $this->user->id);
        if($user){
            $user->update([
                'ten' => $request->ten,
                'phone' => $request->phone,
                'email' => $request->email,
                'id_CQ' => $request->id_CQ,
                
            ]);
            $isSuccess = true;

        }else $isSuccess = false;
    
        if($isSuccess)
            Session::flash('alert', ['type' => 'success', 'message' => 'Cập nhật thành công !']);
        else
            Session::flash('alert', ['type' => 'error', 'message' => 'Cập nhật thất bại !']);
    
        return redirect()->back();
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}