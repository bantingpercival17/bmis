<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    function roles()
    {
        return $this->hasMany(UserRoles::class, 'user_id')->where('is_active', true);
    }
    function user_role()
    {
        return $this->hasOne(UserRoles::class, 'user_id')->where('is_active', true);
    }
    function user_address()
    {
        return $this->hasOne(UserAddress::class, 'user_id');
    }

    /* SETTING : FOR CHECK OF LOCATION */
    function check_region($data)
    {
        return RegionModel::where('region_sort', $data)->first();
    }
    function check_province($data, $name)
    {
        $region = $this->check_region($data);
        return ProvinceModel::where('region_id', $region->id)->where('province_name', $name)->first();
    }
}
