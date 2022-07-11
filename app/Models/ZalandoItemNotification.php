<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZalandoItemNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'zalando_order_notification_id',
        'item_id',
        'ean',
        'price',
        'currency',
        'article_number',
        'article_location',
        'return_reason_code',
        'return_location',
        'cancellation_reason',
    ];
}
