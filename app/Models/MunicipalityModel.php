<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipalityModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'province_id',
        'municipality_name',
        'lgu_type',
    ];
}
