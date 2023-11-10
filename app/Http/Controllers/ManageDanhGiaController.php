<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Models\dotDanhGia;
use App\Models\User;
use App\Models\LoaiDanhGia;
use App\Models\nam;

class ManageDanhGiaController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpage = 5;
        $dotDanhGia = dotDanhGia::where('id_CQ', $this->user->id_CQ)->paginate($perpage)->withQueryString();
        $data_user = User::where('id_CQ', $this->user->id_CQ)->paginate($perpage)->withQueryString();
        $LoaiDanhGia = LoaiDanhGia::all();
        $DanhGia = DanhGia::get();
        $nam = nam::all();


        return view("admin.manageDanhGia.list", compact('data_user', 'dotDanhGia', 'LoaiDanhGia', 'DanhGia', 'nam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function confirmDanhGia(Request $request, $id)
    {
        //
        $dotDanhGia = dotDanhGia::find($id);

        if (!$dotDanhGia) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        }

        $dotDanhGia->trangThai = 2;
        $dotDanhGia->save();

        return response()->json(['message' => 'Cập nhật thành công']);
    }
    public function returnDanhGia(Request $request, $id)
    {
        //
        $trangThai = $request->input('trangThai');
        $ghiChu = $request->input('ghiChu');
        $dotDanhGia = dotDanhGia::find($id);

        if (!$dotDanhGia) {
            return response()->json(['message' => 'Không tìm thấy dữ liệu'], 404);
        }

        $dotDanhGia->trangThai = $trangThai;
        $dotDanhGia->ghiChu = $ghiChu;
        $dotDanhGia->save();

        return response()->json(['message' => 'Cập nhật thành công']);
    }
    public function fetchData()
    {
        // Lấy dữ liệu từ cơ sở dữ liệu (ví dụ: sử dụng Eloquent)
        $data = dotDanhGia::all();

        return response()->json($data);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
