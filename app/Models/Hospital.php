<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'speciality',
        'city',
        'state',
        'address',
        'phone',
        'doctor_name',
    ];
}
