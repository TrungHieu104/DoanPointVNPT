<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dotDanhGia extends Model
{
    use HasFactory;
    protected $timezone = 'Asia/Ho_Chi_Minh';
    protected $table = 'dotdanhgia';
    protected $primaryKey = 'id_DDG';
    protected $fillable = [
        'tenDot',
        'trangThai',
        'ghiChu',
        'date',
        'id_CQ',
        'id_ND',
        'id_thang',
        'id_quy',
        'id_nam',
        'id_LDG',
    ];
    public function total()
    {
        return dotDanhGia::count();
    }
    public function danhGia()
    {
        return $this->hasMany(DanhGia::class, 'id_DDG');
    }
}
