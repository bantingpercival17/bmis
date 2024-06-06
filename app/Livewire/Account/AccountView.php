<?php

namespace App\Livewire\Account;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\RegionModel;
use App\Models\User;
use Livewire\Component;

class AccountView extends Component
{
    public $accountLists = [];
    public $searchInput = null;
    public $address = array(
        'region' => null, 'province' => null, 'municipality' => null, 'barangay' => null, 'street' => ''
    );
    public function render()
    {
        $regionList = RegionModel::all();
        $provinceList = [];
        if ($this->address['region'] != null) {
            $region = RegionModel::find($this->address['region']);
            $provinceList = $region->provinces;
        }
        $municipalityList = $this->address['province'] != null ?  MunicipalityModel::where('region_id', $this->address['region'])->where('province_id', $this->address['province'])->get() : [];
        $barangayList = $this->address['municipality'] != null ? BarangayModel::where('region_id', $this->address['region'])->where('province_id', $this->address['province'])->where('municipality_id', $this->address['municipality'])->get() : [];
        $this->accountLists = $this->resident_list($this->searchInput);
        return view('livewire.account.account-view', compact('regionList', 'provinceList', 'municipalityList', 'barangayList'));
    }
    function resident_list($searchInput)
    {
        $dataLists = User::select('users.*')
            ->join('user_details', 'user_details.user_id', 'users.id');
        if ($this->address['region'] != null) {
            $dataLists->join('user_addresses', 'user_addresses.resident_id', 'resident_models.id')
                ->where('user_addresses.region_id', $this->address['region']);
            if ($this->address['province'] != null) {
                $dataLists->where('user_addresses.province_id', $this->address['province']);
            }
            if ($this->address['municipality'] != null) {
                $dataLists->where('user_addresses.municipality_id', $this->address['municipality']);
            }
            if ($this->address['barangay'] != null) {
                $dataLists->where('user_addresses.barangay_id', $this->address['barangay']);
            }
        }
        if ($searchInput != '') {

            $data = explode(',', $searchInput); // Seperate the Sentence
            $_count = count($data);

            if ($_count > 1) {
                $dataLists = $dataLists->where('user_details.last_name', 'like', '%' . $data[0] . '%')
                    ->where('user_details.first_name', 'like', '%' . trim($data[1]) . '%')
                    ->orderBy('user_details.last_name', 'asc');
            } else {
                $dataLists = $dataLists->where('user_details.last_name', 'like', '%' . $data[0] . '%')
                    ->orderBy('user_details.last_name', 'asc');
            }
        }
        return $dataLists->get();
    }
}
