<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZalandoCustomerBillingAddressNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'zalando_order_notification_id',
        'first_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'zip_code',
        'city',
        'country_code',
    ];
}
