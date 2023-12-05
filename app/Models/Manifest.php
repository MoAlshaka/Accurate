<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'date',
        'type_of_movement',
        'notes',
        "type",
        'branch_id',
        'agent_id',
        'route_id',
        'shipment_id',
        'user_id',
        'customer_id',
    ];
}
