<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'created_dy',
        "status",
        "deposit",
        "incoming_transfer",
        "withdraw",
        "outgoing_transfer",
        "colc",
        "crdt",
        "cash",
        'branch_id',
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
}
