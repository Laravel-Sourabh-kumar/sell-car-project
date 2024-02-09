<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KmsDriven extends Model
{
    use HasFactory;
    protected $table="kms_driven";
    protected $fillable = [
        'kms',
        'detail',
    ];
}
