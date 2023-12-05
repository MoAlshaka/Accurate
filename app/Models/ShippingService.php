<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingService extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'days',
        'shipment_type',
        "status",
        'branch_id',
        'account_deliver',
        'account_tahsel',
        'agent_account',
        'user_id',
    ];
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
