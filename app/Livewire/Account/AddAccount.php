<?php

namespace App\Livewire\Account;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\RegionModel;
use App\Models\ResidentAddressModel;
use App\Models\ResidentModel;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserDetails;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddAccount extends Component
{
    public $users = array(
        'first_name' => '', 'last_name' => '', 'middle_name' => '', 'extension_name' => '',
        'birth_date' => '',
        'birth_place' => '',
        'sex' => '',
        'civil_status' => '',
        'contact_number' => '',
        'region' => null, 'province' => null, 'municipality' => null, 'barangay' => null,
    );

    public $successMessage;
    protected $rules = [
        'users.first_name' => 'required|string',
        'users.last_name' => 'required|string',
        'users.birth_date' => 'required',
        'users.birth_place' => 'required',
        'users.sex' => 'required',
        'users.civil_status' => 'required',
        'users.region' => 'required',
        'users.province' => 'required',
        'users.municipality' => 'required',
        'users.barangay' => 'required',
        'users.role' => 'required',
    ];
    public function render()
    {
        $regionList = RegionModel::all();
        $provinceList = [];
        if ($this->users['region'] != null) {
            $region = RegionModel::find($this->users['region']);
            $provinceList = $region->provinces;
        }
        $municipalityList = $this->users['province'] != null ?  MunicipalityModel::where('region_id', $this->users['region'])->where('province_id', $this->users['province'])->get() : [];
        $barangayList = $this->users['municipality'] != null ? BarangayModel::where('region_id', $this->users['region'])->where('province_id', $this->users['province'])->where('municipality_id', $this->users['municipality'])->get() : [];
        $roleLists = Roles::where('is_removed', false)->get();
        return view('livewire.account.add-account', compact('regionList', 'provinceList', 'municipalityList', 'barangayList', 'roleLists'));
    }
    function selectAddress()
    {
    }
    public function submitForm()
    {
        $this->validate();
        try {
            # Get the role name
            $role = Roles::find($this->users['role']);
            # Create Email
            $first_name = mb_strtolower($this->users['first_name']);
            $last_name = mb_strtolower($this->users['last_name']);
            $password = 'bamis.' . mb_strtolower($role->name);
            $email = $first_name[0] . '.' . str_replace(' ', '', $last_name) . "@bamis.gov.ph";
            // First Create the User
            $user = array(
                'name' => strtoupper($first_name . " " . $last_name),
                'email' => $email,
                'password' => Hash::make($password)
            );
            $findUser = User::where('email', $email)->first();
            try {
                # Store User Details
                if (!$findUser) {
                    $findUser = User::create($user);
                    # Kung wala data ang findUser, ito ay gagawa ng bagong data

                }
            } catch (\Throwable $th) {
                $this->addError('formError', $th->getMessage());
            }
            # User Details
            $data = array(
                'user_id' => $findUser->id,
                'first_name' => ucwords(strtolower(trim($this->users['first_name']))),
                'last_name' => ucwords(strtolower(trim($this->users['last_name']))),
                'middle_name' => ucwords(strtolower(trim($this->users['middle_name']))),
                'extension_name' => ucwords(strtolower(trim($this->users['extension_name']))),
                'birth_date' => $this->users['birth_date'],
                'birth_place' => $this->users['birth_place'],
                'sex' => $this->users['sex'],
                'religion' => '',
                'civil_status' => $this->users['civil_status'],
                'contact_number' => $this->users['contact_number'],
                'user_description' => $role->display_name
            );
            UserDetails::create($data);
            # User Address
            $permanentAddressData = array(
                'user_id' => $findUser->id,
                'region_id' => $this->users['region'],
                'province_id' => $this->users['province'],
                'municipality_id' => $this->users['municipality'],
                'barangay_id' => $this->users['barangay'],
                'street' => 'n/a',
            );
            UserAddress::create($permanentAddressData);
            # Store Role
            UserRoles::create(['user_id' => $findUser->id, 'role_id' => $role->id,]);
            $this->reset(['users']);
            return redirect(route('account.view'));
        } catch (\Throwable $th) {
            $this->addError('formError', $th->getMessage());
            #return response(['errors' => ['bugs' => $th->getMessage()]], 402);
        }
    }
}
