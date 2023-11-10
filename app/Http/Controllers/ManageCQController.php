<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoQuan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ManageCQController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpage = 5;
        $cq_curent = CoQuan::where('id_CQ', Auth::user()->id_CQ)->first();
        $data_list_cq = CoQuan::where('parent_CQ', $cq_curent->id_CQ)->get();
        $data_list_parent_cq = CoQuan::where('parent_CQ', 0)->get();
        // dd($data_list_cq);
        return view(
            "admin.manageCQ.list",
            compact(
                'data_list_cq',
                'data_list_parent_cq'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $parent_CQ = CoQuan::where('parent_CQ', 0)->get();
        return view("admin.manageCQ.create", compact('parent_CQ'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cq = new CoQuan;
        $cq->ten = $request['name'];
        $cq->diaChi = $request['address'];
        $cq->email = $request['email'];
        $cq->phone = $request['phone'];
        $cq->parent_CQ = $request['parent_CQ'];
        $cq->save();
        Session::flash('alert', ['type' => 'success', 'message' => 'Thêm mới thành công !']);
        return redirect()->route('manageCQ.index');
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
        $parent_CQ = CoQuan::where('parent_CQ', 0)->get();
        $get_one_cq = CoQuan::where('id_CQ', $id)->first();
        return view("admin.manageCQ.edit", compact('parent_CQ', 'get_one_cq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $isSuccess = false;
        $cq = CoQuan::where('id_CQ', $id)->first();
        if ($cq) {
            $cq->update([
                $cq->ten = $request->name,
                $cq->diaChi = $request->address,
                $cq->email = $request->email,
                $cq->phone = $request->phone,
                $cq->parent_CQ = $request->parent_CQ,
            ]);
            $isSuccess = true;

        } else
            $isSuccess = false;

        if ($isSuccess)
            Session::flash('alert', ['type' => 'success', 'message' => 'Cập nhật thành công !']);
        else
            Session::flash('alert', ['type' => 'error', 'message' => 'Cập nhật thất bại !']);

        return redirect(route('manageCQ.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cq = CoQuan::findOrFail($id);
        $cq->delete();

        Session::flash('alert', ['type' => 'success', 'message' => 'Xóa thông tin thành công !']);
        return redirect(route('manageCQ.index'));
    }
}
