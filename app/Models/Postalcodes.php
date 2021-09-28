<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postalcodes extends Model
{
    use HasFactory;

    protected $table = 'postal_codes';
    protected $fillable = [
        'province',
        'city',
        'postal_code',
        'sub_postal_code'
    ];

}
