<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quy extends Model
{
    use HasFactory;
    protected $table = 'quy';
    protected $primaryKey = 'id_quy';
    protected $fillable = [
        'quy',
    ];
}
