<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthorizationBasicAuth extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'app',
        'store_id',
        'username',
        'password',
        'basic'
    ];

    protected $hidden = [
        'password',
        'basic',
    ];
}
