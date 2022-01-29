<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'full_name', 'phone_number', 'gender'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
