<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZalandoOrderNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'event_id',
        'order_id',
        'order_number',
        'state',
        'store_id',
        'timestamp',
    ];
}
