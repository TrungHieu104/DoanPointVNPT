<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoQuan extends Model
{
    use HasFactory;
    protected $table = 'coquan';
    protected $primaryKey = 'id_CQ';
    protected $fillable = [
        'ten',
        'diaChi',
        'email',
        'phone',
        'parent_CQ',
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'id_CQ');
    }
    public function tieuChi()
    {
        return $this->hasMany(TieuChi::class, 'id_CQ');
    }
}