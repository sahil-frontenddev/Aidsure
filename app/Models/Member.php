<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'family_id',
        'name',
        'adhar',
        'signature',
    ];
}
