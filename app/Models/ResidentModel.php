<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentModel extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'middle_name', 'extension_name', 'birth_date', 'birth_place', 'sex', 'religion', 'civil_status', 'contact_number', 'created_by'];

    function address_list()
    {
        return $this->hasMany(ResidentAddressModel::class, 'resident_id');
    }
    function address()
    {
        return $this->hasOne(ResidentAddressModel::class, 'resident_id')->where('is_removed', false);
    }
    function profile()
    {
        $sex = $this->sex;
        return $sex == 'Female' ? asset('/assets/img/female.png') : asset('/assets/img/male.png');
    }
    function complete_name()
    {
        return $this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name;
    }
    function complete_address()
    {
        return $this->address->street . ' ' . $this->address->barangay->barangay_name . ', ' . $this->address->municipality->municipality_name . ', ' . $this->address->province->province_name;
    }
    function barangay_clearance_issued()
    {
        return $this->hasMany(BarangayClearance::class, 'resident_id')->where('is_removed', false);
    }
}
