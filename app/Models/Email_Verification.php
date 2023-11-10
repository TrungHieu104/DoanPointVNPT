<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email_Verification extends Model
{
    use HasFactory;
    protected $table = 'email_verification';
    protected $fillable = [
        'email',
        'otp',
    ];
}
