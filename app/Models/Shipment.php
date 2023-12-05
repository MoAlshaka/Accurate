<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        "shipment_number",
        'type_of_movement',
        'request_type',
        'package_desc',
        'package_price',
        'weight',
        'width',
        'long',
        'high',
        'piece_number',
        'payment_method',
        'account_type',
        'margay_number',
        'package_open',
        'notes',
        'sender_name',
        'service',
        'sender_city',
        'sender_zone',
        'sender_address',
        'sender_phone',
        'sender_mobile',
        'receiver_name',
        'receiver_city',
        'receiver_zone',
        'receiver_address',
        'receiver_phone',
        'receiver_mobile',
        'branch_id',
        'customer_id',
        'user_id',
    ];
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function pkm()
    {
        return $this->BelongsTo('App\Models\Pkm');
    }
}
