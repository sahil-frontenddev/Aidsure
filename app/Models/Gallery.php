<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
class Gallery extends Model
{
    protected $table = 'gallerys';
    use HasFactory;

    protected $fillable = [
        'name',
        
    ];

    public function getmembers(){
        return $this->hasMany(Member::class);
    }
}
