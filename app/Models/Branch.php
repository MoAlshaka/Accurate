<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        "branch_code",
        "branch_name",
        "country",
        "mohafza",
        "city",
        "zone",
        "address",
        "phone",
        "fax",
        'status',
        'type',
        'user_id',

    ];
    public function zones()
    {
        return $this->hasMany('App\Models\Zone');
    }
    public function agents()
    {
        return $this->hasMany('App\Models\Agent');
    }
    public function shippingServices()
    {
        return $this->hasMany('App\Models\ShippingService');
    }
    public function warehouses()
    {
        return $this->hasMany('App\Models\Warehouse');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function safes()
    {
        return $this->hasMany('App\Models\Safe');
    }
    public function journalTypes()
    {
        return $this->hasMany('App\Models\JournalType');
    }
    public function shipmentTransaction()
    {
        return $this->hasMany('App\Models\ShipmentTransaction');
    }
    public function pickups()
    {
        return $this->hasMany('App\Models\Pickup');
    }
    public function pkms()
    {
        return $this->hasMany('App\Models\Pkm');
    }
}
