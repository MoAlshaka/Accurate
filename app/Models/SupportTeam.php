<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'created_dy',
        'support_cate_id',
        'user_id',
    ];
    public function supportCate()
    {
        return $this->belongsTo('App\Models\SupportCate');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
