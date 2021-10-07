<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $table = 'laboratory';
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
