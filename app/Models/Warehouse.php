<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "status",
        'branch_id',
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
