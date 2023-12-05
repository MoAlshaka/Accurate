<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalType extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'branch_id',
        'sersies',
        'reference',
        "status",
        'user_id',
    ];
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
    public function shipmentTransaction()
    {
        return $this->hasMany('App\Models\ShipmentTransaction');
    }
}
