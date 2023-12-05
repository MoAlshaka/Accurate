<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiarie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "status",
        'code',
        'user_id',
    ];
    public function shipmentTransactions()
    {
        return $this->hasMany('App\Models\ShipmentTransaction');
    }
}
