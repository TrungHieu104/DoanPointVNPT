<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CoQuan;
use App\Models\DanhGia;
use App\Models\dotDanhGia;
use Illuminate\Support\Facades\Session;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $cq = CoQuan::find($this->user->id_CQ);
            view()->share([
                'cq' => $cq,
            ]);
            return $next($request);
        });
    }
    
    public function index()
    {
        //$data_list_users = User::where('id_CQ',$this->user->id_CQ)->get();
        //
        $perpage = 5;
        $data_list_users = User::where('id_CQ',$this->user->id_CQ)->paginate($perpage)->withQueryString();

        return view("admin.manageUsers.list", [
            'title' => 'Quản lý Đoàn viên',
            'data_list_users' => $data_list_users,
            // 'data_list_parent_cq' => $data_list_parent_cq,
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
        $get_one_user = User::where('id',$id)->first();
        return view("admin.manageUsers.edit", [
            'title' => 'Sửa Đoàn viên ',
            // 'tieuChis' => $tieuChis,
            'get_one_user' => $get_one_user,
            // 'danhGias' => $danhGias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $isSuccess = false;
        $user = User::where('id', $id);
        if($user){
            $user->update([
                'ten' => $request->ten,
                'phone' => $request->phone,
                'email' => $request->email,                
            ]);
            $isSuccess = true;

        }else $isSuccess = false;
    
        if($isSuccess)
            Session::flash('alert', ['type' => 'success', 'message' => 'Cập nhật thành công !']);
        else
            Session::flash('alert', ['type' => 'error', 'message' => 'Cập nhật thất bại !']);
    
        return redirect(route('manageUsers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $dotDanhGia = dotDanhGia::where('id_ND',$user->id)->get();

        if($dotDanhGia != null){
            //dùng lặp foreach lấy ra từng đợt đánh giá
            foreach($dotDanhGia as $dotDanhGia){
                //lấy tất cả các đánh giá liên quan theo từng lần lặp
                $danhGias = DanhGia::where('id_DDG', $dotDanhGia->id_DDG)->get();
                //xóa tất cả các đánh giá liên quan theo từng lần lặp
                foreach ($danhGias as $danhGia) {
                    $danhGia->delete();
                }
                //xóa đợt đánh giá
                $dotDanhGia->delete();
            }
        }
        $user->delete();

        Session::flash('alert', ['type' => 'success', 'message' => 'Xóa thông tin thành công !']);
        return redirect(route('manageUsers.index'));
    }
}
