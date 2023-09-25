<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nam extends Model
{
    use HasFactory;
    protected $table = 'nam';
    protected $primaryKey = 'id_nam';
    protected $fillable = [
        'nam',
    ];
}
