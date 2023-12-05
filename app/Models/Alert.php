<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'content',
        'type',
        'methods',
        'image',
        'user_id',
        'send_date',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
