<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "name",
        "company_representative",
        'branch_id',
        "personal_account",
        "activity",
        "account_type",
        "request_type",
        "package_open",
        "category",
        'price_list_id',
        "tax",
        "payment_method",
        "payment_schedule",
        "phone_hiden",
        "shipping_code",
        "return_fees",
        "uncollected_shipments",
        "storage",
        "receipt_code",
        "city",
        "zone",
        "phone",
        "mobile",
        "postal_code",
        "address",
        "email",
        "colc",
        "crdt",
        "cash",
        "status",
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
    public function priceList()
    {
        return $this->belongsTo('App\Models\PriceList');
    }
    public function shipments()
    {
        return $this->hasMany('App\Models\Shipment');
    }
    public function pickups()
    {
        return $this->hasMany('App\Models\Pickup');
    }
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
    public function pkms()
    {
        return $this->hasMany('App\Models\Pkm');
    }
}
