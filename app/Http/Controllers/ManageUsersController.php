<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CoQuan;
use App\Models\DanhGia;
use App\Models\dotDanhGia;
use Illuminate\Support\Facades\Session;

class ManageUsersController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data_list_users = User::where('id_CQ',$this->user->id_CQ)->get();
        //
        $perpage = 5;
        $data_list_users = User::where('id_CQ', $this->user->id_CQ)->paginate($perpage)->withQueryString();

        return view("admin.manageUsers.list", compact('data_list_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.manageUsers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User;
        $user->ten = $request['ten'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = $request->password;
        $user->id_CQ = $this->user->id_CQ;
        $user->role = $request['role'];
        $user->save();
        Session::flash('alert', ['type' => 'success', 'message' => 'Thêm mới thành công !']);

        return redirect(route('manageUsers.index'));
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
        $get_one_user = User::where('id', $id)->first();
        return view("admin.manageUsers.edit", compact('get_one_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $isSuccess = false;
        $user = User::where('id', $id);
        if ($user) {
            $user->update([
                'ten' => $request->ten,
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => $request->role,
            ]);
            $isSuccess = true;

        } else
            $isSuccess = false;

        if ($isSuccess)
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
        $dotDanhGia = dotDanhGia::where('id_ND', $user->id)->get();

        if ($dotDanhGia != null) {
            //dùng lặp foreach lấy ra từng đợt đánh giá
            foreach ($dotDanhGia as $dotDanhGia) {
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