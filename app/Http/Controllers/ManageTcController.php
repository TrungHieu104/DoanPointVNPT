<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TieuChi;
use Illuminate\Support\Facades\Session;
class ManageTcController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpage = 5;
        $data_list_tc = TieuChi::where('id_CQ', $this->user->id_CQ)->paginate($perpage)->withQueryString();

        return view("admin.manageTC.list", compact('data_list_tc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.manageTC.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $tieuChi = new TieuChi;
        $tieuChi->ten = $request['ten'];
        $tieuChi->diemQuyDinh = $request['diemQuyDinh'];
        $tieuChi->id_CQ = $this->user->id_CQ;
        $tieuChi->save();

        Session::flash('alert', ['type' => 'success', 'message' => 'Thêm mới thành công']);
        return redirect()->route('manageTieuChi.index');
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
        $get_one_tc = TieuChi::where('id_TC', $id)->first();
        return view("admin.manageTC.edit",compact('get_one_tc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tieuChi = TieuChi::where('id_TC', $id);
        if ($tieuChi) {
            $tieuChi->update([
                'ten' => $request->ten,
                'diemQuyDinh' => $request->diemQuyDinh,
            ]);
        }
        Session::flash('alert', ['type' => 'success', 'message' => 'Cập nhật thành công']);
        return redirect()->route('manageTieuChi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tieuChi = TieuChi::where('id_TC', $id)->first();
        $tieuChi->delete();
        Session::flash('alert', ['type' => 'success', 'message' => 'Xóa thành công']);
        return redirect()->route('manageTieuChi.index');
    }
}
