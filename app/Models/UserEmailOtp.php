<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmailOtp extends Model
{
    use HasFactory;
    public $table = "user_email_otps";
    protected $fillable = [
        'user_id',
        'otp',
    ];
}
