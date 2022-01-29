<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    public function courier () {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    public function order () {
        return $this->belongsToMany(Order::class, 'service_id');
    }
}
