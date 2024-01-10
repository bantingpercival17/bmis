<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    use HasFactory;
    protected $fillable = ['region_name', 'abbreviation', 'region_sort'];

    function provinces()
    {
        return $this->hasMany(ProvinceModel::class, 'region_id');
    }
}
