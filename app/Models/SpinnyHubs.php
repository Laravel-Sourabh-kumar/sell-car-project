<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpinnyHubs extends Model
{
    use HasFactory;
    protected $table="spinny_hubs";
    protected $fillable = [
        'name',
        'address',
        'pincode',
        'state',
        'city',
    ];
}
