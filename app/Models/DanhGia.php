<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    protected $table = 'danhgia';
    protected $primaryKey = 'id_DG';
    protected $fillable = [
        'id_TC',
        'ten_tieu_chi',
        'diem',
        'diemQuyDinh',
        'link',
        'ghiChu',
        'date',
        'id_DDG',
    ];
    public function tieuChi()
    {
        return $this->belongsTo(TieuChi::class, 'id_TC');
    }
    public function dotDanhGia()
    {
        return $this->belongsTo(dotDanhGia::class, 'id_DDG');
    }
}
