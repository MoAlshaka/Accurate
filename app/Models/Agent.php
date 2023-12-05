<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "name",
        "personal_account",
        "ahda_account",
        "kind_of_commission",
        "much_of_commission",
        "country",
        "mohafza",
        "city",
        "zone",
        "address",
        "phone",
        "phone1",
        "email_box",
        "email_sign",
        "email",
        'status',
        'payment',
        "branch_id",
        "route_id",
        "commission_id",
        "user_id",
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function branch()
    {
        return $this->BelongsTo('App\Models\Branch');
    }
    public function route()
    {
        return $this->BelongsTo('App\Models\Route');
    }
    public function commission()
    {
        return $this->BelongsTo('App\Models\AgentCommission');
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
