<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $table = 'couriers';
    protected $guarded = ['id'];

    public function service () {
        return $this->hasMany(Service::class);
    }

    public function order () {
        return $this->belongsToMany(Order::class, 'courier_id');
    }
}
