<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id'];

    public function user () {
        return $this->hasOne(User::class, 'buyer_id');
    }

    public function address ()
    {
        return $this->hasOne(Address::class, 'address_id');
    }

    public function courier ()
    {
        return $this->hasOne(Courier::class, 'courier_id');
    }

    public function service ()
    {
        return $this->hasOne(Service::class, 'service_id');
    }

    public function payment ()
    {
        return $this->hasOne(PaymentMethod::class, 'payment_method_id');
    }

    public function orderedProduct () {
        return $this->hasMany(OrderedProduct::class);
    }
}
