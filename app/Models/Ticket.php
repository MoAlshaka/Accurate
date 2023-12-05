<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'address',
        'notes',
        'status',
        'image',
        'customer_id',
        'support_cate_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function support_cate()
    {
        return $this->belongsTo('App\Models\SupportCate');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
