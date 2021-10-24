<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
class Family extends Model
{
    protected $table = 'family';
    use HasFactory;

    protected $fillable = [
        'rnf',
        'family_id',
        'user_id',
        'st_address',
        'city',
        'state',
        'address',
        'phone',
    ];

    public function getmembers(){
        return $this->hasMany(Member::class);
    }
}
