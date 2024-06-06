<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','first_name', 'last_name', 'middle_name', 'extension_name', 'birth_date', 'birth_place', 'sex', 'religion', 'civil_status', 'contact_number', 'user_description'];
}
