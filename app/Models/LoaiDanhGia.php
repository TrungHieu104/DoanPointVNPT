<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiDanhGia extends Model
{
    use HasFactory;
    protected $table = 'loaidanhgia';
    protected $primaryKey = 'id_LDG';
    protected $fillable = [
        'id_thang',
        'id_quy',
        'id_nam',
    ];
    public function nam()
    {
        return $this->hasMany(nam::class, 'id_nam');
    }
}
