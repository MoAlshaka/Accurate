<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'document',
        'sersies',
        'personal_account',
        "status",
        "branch_id",
        "journal_type_id",
        'subsidiary_id',
        'user_id',
    ];
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

    public function journalType()
    {
        return $this->belongsTo('App\Models\JournalType');
    }
    public function subsidiary()
    {
        return $this->belongsTo('App\Models\Subsidiarie');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
