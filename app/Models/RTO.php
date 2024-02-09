<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTO extends Model
{
    use HasFactory;
    protected $table="r_t_o_s";
    protected $fillable = [
        'rto_full_name',
        'rto_short_name',
        'rto_address',
        'rto_pincode',
        'rto_state',
        'rto_city',
    ];
   
}
