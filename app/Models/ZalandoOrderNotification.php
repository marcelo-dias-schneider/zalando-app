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
        'authorization_basic_auth_id',
        'timestamp',
    ];

    public function items()
    {
        return $this->hasMany(ZalandoItemNotification::class);
    }

    public function delivery_details()
    {
        return $this->hasOne(ZalandoDeliveryDetailsNotification::class);
    }

    public function customer_billing_address()
    {
        return $this->hasOne(ZalandoCustomerBillingAddressNotification::class);
    }

    public function authorization_basic_auth()
    {
        return $this->belongsTo(AuthorizationBasicAuth::class);
    }
}
