<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentModel extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'middle_name', 'extension_name', 'birth_date', 'birth_place', 'sex', 'religion', 'civil_status', 'contact_number'];

    function address_list()
    {
        return $this->hasMany(ResidentAddressModel::class, 'resident_id');
    }
}
