<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CoQuan;
use App\Models\TieuChi;
use App\Models\LoaiDanhGia;
use App\Models\DanhGia;
use App\Models\dotDanhGia;
use App\Models\thang;
use App\Models\quy;
use App\Models\nam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PointUserController extends Controller
{
    protected $user;
    protected $perpage = 5;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $cq = CoQuan::find($this->user->id_CQ);
            $thang = thang::all();
            $quy = quy::all();
            $nam = nam::all();
            view()->share(compact('cq', 'thang', 'quy', 'nam'));
            return $next($request);
        });
    }
    function index($dotDG = null)
    {
        $dotDG != null 
        ? $data_list_point = $dotDG 
        : $data_list_point = dotDanhGia::where('id_ND', $this->user->id)->orderby('id_DDG', 'desc')->paginate($this->perpage)->withQueryString();
        $data_LDG = LoaiDanhGia::all();
        // $nam = nam::all();
        $danhGias = DanhGia::get();
        $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();
        return view(
            "user.point.list",
            compact('data_list_point', 'data_LDG', 'data_LDG', 'tieuChis', 'danhGias')
        );
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
            return view("user.point.create", compact('tieuChis'));
        } else {
            return view("user.point.create", compact('tieuChis'));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loaiDanhGia = new LoaiDanhGia;
        $id_LDG = null;
        $thang = $request['thang'];
        $quy = $request['quy'];
        $nam = $request['nam'];

        if ($thang !== null && $nam !== null) {
            $id_LDG = LoaiDanhGia::where('id_thang', $thang)
                ->where('id_quy', null)
                ->where('id_nam', $nam)
                ->value('id_LDG');
        } else if ($quy !== null && $nam !== null) {
            $id_LDG = LoaiDanhGia::where('id_thang', null)
                ->where('id_quy', $quy)
                ->where('id_nam', $nam)
                ->value('id_LDG');
        } else if ($nam !== null) {
            $id_LDG = LoaiDanhGia::where('id_thang', null)
                ->where('id_quy', null)
                ->where('id_nam', $nam)
                ->value('id_LDG');
        }
        if ($id_LDG === null) {
            return redirect("/list")->with('alert', ['type' => 'danger', 'message' => 'Lỗi mã bị bỏ trống!']);
        }

        //save dotDanhGia
        $dotDanhGia = new dotDanhGia;
        $dotDanhGia->tenDot = $request['tenDot'];
        $dotDanhGia->id_CQ = $this->user->id_CQ;
        $dotDanhGia->id_ND = $this->user->id;
        $dotDanhGia->id_LDG = $id_LDG;
        $dotDanhGia->trangThai = 1;
        $dotDanhGia->date = Carbon::now();
        $dotDanhGia->save();
        //save danhGia
        $tieuChis = TieuChi::where('id_CQ', $this->user->id_CQ)->get();
        foreach ($tieuChis as $tieuChi) {
            if($request['diem'][$tieuChi->id_TC] !== null){
                $danhGia = new DanhGia;
                $danhGia->ten_tieu_chi = $tieuChi->ten;
                $danhGia->diem = $request['diem'][$tieuChi->id_TC];
                $danhGia->diemQuyDinh = $tieuChi->diemQuyDinh;
                $danhGia->link = $request['link'][$tieuChi->id_TC];
                $danhGia->ghiChu = $request['ghiChu'][$tieuChi->id_TC];
                $danhGia->date = Carbon::now();
                $danhGia->id_TC = $tieuChi->id_TC ?? '';
                $danhGia->id_DDG = $dotDanhGia->id_DDG;
                $danhGia->save();
            }
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

        return view("user.point.edit", compact('tieuChis','dotDG','danhGias'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            $danhGia->ten_tieu_chi = $tieuChi->ten;
            $danhGia->diem = $request->diem[$tieuChi->id_TC];
            $danhGia->diemQuyDinh = $tieuChi->diemQuyDinh;
            $danhGia->link = $request->link[$tieuChi->id_TC];
            $danhGia->ghiChu = $request->ghiChu[$tieuChi->id_TC];
            $danhGia->date = Carbon::now();
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

        return redirect('/list')->with('alert', ['type' => 'success', 'message' => 'Xóa thông tin thành công !']);
    }
    public function sort(Request $request){
        $id_LDG = null;
        $thang = $request['thang'];
        $quy = $request['quy'];
        $nam = $request['nam'];
        if ($thang !== null && $nam !== null) {
            $id_LDG = LoaiDanhGia::where('id_thang', $thang)
                ->where('id_quy', null)
                ->where('id_nam', $nam)
                ->value('id_LDG');
        } else if ($quy !== null && $nam !== null) {
            $id_LDG = LoaiDanhGia::where('id_thang', null)
                ->where('id_quy', $quy)
                ->where('id_nam', $nam)
                ->value('id_LDG');
        } else if ($nam !== null) {
            $id_LDG = LoaiDanhGia::where('id_thang', null)
                ->where('id_quy', null)
                ->where('id_nam', $nam)
                ->value('id_LDG');
        }
        if ($id_LDG === null) {
            return redirect('/list')->with('alert', ['type' => 'warning', 'message' => 'Lỗi mã bị bỏ trống!']);
        }
        $dotDG = dotDanhGia::where('id_ND', $this->user->id)->where('id_LDG', $id_LDG)->orderby('id_DDG', 'desc')->paginate($this->perpage)->withQueryString();
        return $this->index($dotDG);
        // dd($dotDG);
    }

}