<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'date',
        'type_of_movement',
        'number_of_shipments',
        'notes',
        'type',
        'branch_id',
        'agent_id',
        'route_id',
        'shipment_id',
        'customer_id',
        'user_id',
    ];
    public function branch()
    {
        return $this->BelongsTo('App\Models\Branch');
    }
    public function agent()
    {
        return $this->BelongsTo('App\Models\Agent');
    }
    public function customer()
    {
        return $this->BelongsTo('App\Models\Customer');
    }
    public function shipments()
    {
        return $this->hasMany('App\Models\Shipment');
    }
}
