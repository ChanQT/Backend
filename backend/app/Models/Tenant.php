<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenantName',
        'roomNo',
        'phoneNumber',
        'guardianName',
         'startDate', // Add this line
    ];
}
