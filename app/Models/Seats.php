<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    use HasFactory;
    protected $table="seats";
    protected $fillable = [
        'seat_number',
        'seat_detail',
    ];
    
}
