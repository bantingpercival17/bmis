<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'region_id', 'province_id',   'municipality_id', 'barangay_id', 'street'
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function region()
    {
        return $this->belongsTo(RegionModel::class, 'region_id');
    }
    function province()
    {
        return $this->belongsTo(ProvinceModel::class, 'province_id');
    }
    function municipality()
    {
        return $this->belongsTo(MunicipalityModel::class, 'municipality_id');
    }
    function barangay()
    {
        return $this->belongsTo(BarangayModel::class, 'barangay_id');
    }
}
