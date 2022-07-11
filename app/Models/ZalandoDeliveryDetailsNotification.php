<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZalandoDeliveryDetailsNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'zalando_order_notification_id',
        'delivery_tracking_number',
        'delivery_carrier_name',
        'return_tracking_number',
        'return_carrier_name',
    ];
}
