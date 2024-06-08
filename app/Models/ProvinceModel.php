<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'province_name'
    ];

    function municipalities()
    {
        return $this->hasMany(MunicipalityModel::class, 'province_id');
    }
}
