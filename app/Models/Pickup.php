<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'date',
        'type_of_movement',
        'customer_id',
        'agent_id',
        'agent_answer',
        'transport',
        'start_at',
        'end_at',
        'number_of_shipments',
        'shipments_receive',
        'status',
        'user_id',
        'branch_id',
        'notes',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
