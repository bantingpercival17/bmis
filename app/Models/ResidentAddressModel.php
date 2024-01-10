<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentAddressModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'resident_id',
        'region_id', 'province_id',   'municipality_id',
        'barangay_id',   'street'
    ];

    function resident()
    {
        return $this->belongsTo(ResidentModel::class, 'resident_id');
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
