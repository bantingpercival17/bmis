<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'province_id',
        'municipality_id',
        'barangay_name',
    ];

    function total_residents()
    {
        return $this->hasMany(ResidentAddressModel::class, 'barangay_id')->where('is_removed', false);
    }
}
