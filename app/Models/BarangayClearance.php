<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayClearance extends Model
{
    use HasFactory;
    protected $fillable = [
        'resident_id',
        'resident_address_id',
        'propose',
        'occupation',
        'length_of_residency',
        'identification_id_type',
        'identification_id_number',
        'identification_issuing_agency',
        'is_renew',
        'created_by'
    ];
    function resident()
    {
        return $this->belongsTo(ResidentModel::class, 'resident_id');
    }
    function resident_address()
    {
        return $this->belongsTo(ResidentAddressModel::class, 'resident_address_id');
    }
}
