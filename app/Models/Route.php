<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "name",
        "car",
        "driver",
        "status",
        "user_id",
    ];
    public function agents()
    {
        return $this->hasMany('App\Models\Agent');
    }
}
