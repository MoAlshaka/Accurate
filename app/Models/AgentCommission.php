<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentCommission extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "name",
        "desc",
        "user_id",
    ];
    public function agents()
    {
        return $this->hasMany('App\Models\Agent');
    }
}
