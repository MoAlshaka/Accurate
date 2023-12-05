<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        "company_name",
        "company_owner",
        "activity",
        "phone",
        "number_of_recorder",
        "number_of_credit",
        "email",
        "website",
        "zone",
        "head_of_report",
        "footer_of_report",
    ];
}
