<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    


}
