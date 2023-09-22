<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieuChi extends Model
{
    use HasFactory;
    protected $table = 'tieuchi';
    protected $primaryKey = 'id_TC';
    protected $fillable = [
        'ten',
        'id_CQ',
    ];
    public function users()
    {
        return $this->belongsTo(CoQuan::class, 'id_CQ');
    }
    public function danhGia()
    {
        return $this->hasMany(DanhGia::class, 'id_TC');
    }
}
