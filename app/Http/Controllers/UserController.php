<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CoQuan;
use App\Models\TieuChi;
use App\Models\LoaiDanhGia;
use App\Models\DanhGia;
use App\Models\dotDanhGia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $cq = CoQuan::find($this->user->id_CQ);
            view()->share('cq', $cq);
            return $next($request);
        });
    }

    function index()
    {
        // $currentMonth = Carbon::now()->month;
        // $currentQuarter = (int) (($currentMonth - 1) / 3) + 1;
        // $currentYear = Carbon::now()->year;

        $dataCQ = CoQuan::all();
        $dataLDG = LoaiDanhGia::all();


        // $id_LDG_current = LoaiDanhGia::where('thang', $currentMonth)
        //     ->where('quy', $currentQuarter)
        //     ->where('nam', $currentYear)
        //     ->first();

        // $cq = CoQuan::find($this->user->id_CQ);
        // $dataTC = TieuChi::where('id_LDG', $id_LDG_current->id_LDG)->get();

        // $dataDG = DB::table('danhgia')
        //     ->where('id_ND', $this->user->id)
        //     ->where('id_LDG', $id_LDG_current->id_LDG)
        //     ->get('diemTuCham');



        return view("user.home", [
            'dataCQ' => $dataCQ,
            // 'dataTC' => $dataTC,
            // 'dataLDG' => $dataLDG,
            // 'id_LDG_current' => $id_LDG_current,
            // 'dataDG' => $dataDG,
            // 'currentMonth' => $currentMonth,
            // 'currentQuarter' => $currentQuarter,
            // 'currentYear' => $currentYear,
        ]);
    }
    function list()
    {
        $data_list_point = dotDanhGia::where('id_ND', $this->user->id)->get();
        return view("user.point.list", [
            'title' => 'Danh sách',
            'data_list_point' => $data_list_point,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();
        if ($tieuChis->count() == 0) {
            session()->flash('message', 'Hiện chưa cập nhật tiêu chí tại cơ quan' . $this->user->ten_CQ);
            return view("user.point.create", [
                'title' => 'Tạo đợt ',
                'tieuChis' => $tieuChis,
            ]);
        } else {
            return view("user.point.create", [
                'title' => 'Tạo đợt ',
                'tieuChis' => $tieuChis,
            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save dotDanhGia
        $dotDanhGia = new dotDanhGia;
        $dotDanhGia->tenDot = $request['tenDot'];
        $dotDanhGia->id_CQ = $this->user->id_CQ;
        $dotDanhGia->id_ND = $this->user->id;
        $dotDanhGia->id_LDG = 9;
        $dotDanhGia->trangThai = 1;
        $dotDanhGia->save();
        //save danhGia
        $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();
        foreach ($tieuChis as $tieuChi) {
            $danhGia = new DanhGia;
            $danhGia->id_TC = $tieuChi->id_TC;
            $danhGia->diem = $request['diem'][$tieuChi->id_TC];
            $danhGia->link = $request['link'][$tieuChi->id_TC];
            $danhGia->ghiChu = $request['ghiChu'][$tieuChi->id_TC];
            $danhGia->id_DDG = $dotDanhGia->id_DDG;
            $danhGia->save();
        }
        return redirect("/list")->with('alert', ['type' => 'success', 'message' => 'Thêm thông tin thành công !']);

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
        $danhGias = DanhGia::where('id_DDG', $id)->get();
        $dotDG = dotDanhGia::where('id_DDG', $id)->first();
        $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();

        return view("user.point.edit", [
            'title' => 'Sửa đợt ',
            'tieuChis' => $tieuChis,
            'dotDG' => $dotDG,
            'danhGias' => $danhGias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     // Lấy danh sách tiêu chí
    //     $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();

    //     // Cập nhật thông tin đợt đánh giá
    //     $dotDanhGia = dotDanhGia::findOrFail($id);
    //     $dotDanhGia->tenDot = $request->tenDot;
    //     $dotDanhGia->trangThai = 1;
    //     $dotDanhGia->save();

    //     // Cập nhật thông tin điểm đánh giá
    //     foreach ($tieuChis as $tieuChi) {
    //         $danhGia = DanhGia::firstOrNew(['id_DDG' => $id, 'id_TC' => $tieuChi->id_TC]);
    //         $danhGia->diem = $request->diem[$tieuChi->id_TC];
    //         $danhGia->link = $request->link[$tieuChi->id_TC];
    //         $danhGia->ghiChu = $request->ghiChu[$tieuChi->id_TC];
    //         $danhGia->save();
    //     }
    //     return redirect("/list")->with('alert', ['type' => 'success', 'message' => 'Cập nhật thông tin thành công !']);
    // }
    public function update(Request $request, string $id)
    {
        // Lấy danh sách tiêu chí
        $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();

        // Cập nhật thông tin đợt đánh giá
        $dotDanhGia = dotDanhGia::findOrFail($id);
        $dotDanhGia->update([
            'tenDot' => $request->tenDot,
            'trangThai' => 1,
        ]);

        // Cập nhật thông tin điểm đánh giá
        foreach ($tieuChis as $tieuChi) {
            $danhGia = DanhGia::firstOrNew(['id_DDG' => $id, 'id_TC' => $tieuChi->id_TC]);
            $danhGia->diem = $request->diem[$tieuChi->id_TC];
            $danhGia->link = $request->link[$tieuChi->id_TC];
            $danhGia->ghiChu = $request->ghiChu[$tieuChi->id_TC];
            $danhGia->save();
        }
        return redirect("/list")->with('alert', ['type' => 'success', 'message' => 'Cập nhật thông tin thành công !']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //lấy đợt đánh giá cần xóa
        $dotDanhGia = dotDanhGia::findOrFail($id);

        //lấy tất cả các đánh giá liên quan
        $danhGias = DanhGia::where('id_DDG', $dotDanhGia->id_DDG)->get();

        //xóa tất cả các đánh giá liên quan
        foreach ($danhGias as $danhGia) {
            $danhGia->delete();
        }
        //xóa đợt đánh giá
        $dotDanhGia->delete();

        return back()->with('alert', ['type' => 'danger', 'message' => 'Xóa thông tin thành công !']);
    }


}