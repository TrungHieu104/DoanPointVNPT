<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoQuan;

class ManageCQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpage = 5;
        $data_list_cq = CoQuan::get();
        $data_list_parent_cq = CoQuan::where('parent_CQ',0)->get();
        return view("admin.manageCQ.list", [
            'title' => 'Quản lý cơ quan',
            'data_list_cq' => $data_list_cq,
            'data_list_parent_cq' => $data_list_parent_cq,
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
