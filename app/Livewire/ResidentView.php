<?php

namespace App\Livewire;

use App\Livewire\Resident\AddInformation;
use App\Models\ResidentModel;
use Livewire\Component;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\ProvinceModel;
use App\Models\RegionModel;
use App\Models\ResidentAddressModel;
use Illuminate\Support\Facades\Auth;

class ResidentView extends Component
{
    public $residentLists;
    protected $listeners = ['tableRefresh' => 'refreshTable'];
    public $searchInput = null;
    public $residents = array(
        'region' => null, 'province' => null, 'municipality' => null, 'barangay' => null, 'street' => ''
    );

    public $filter = array(
        'gender' => null, 'civil_status' => null, 'age_group_name' => null
    );

    public function render()
    {
        $regionList = RegionModel::all();
        $provinceList = [];
        if ($this->residents['region'] != null) {
            $region = RegionModel::find($this->residents['region']);
            $provinceList = $region->provinces;
        }
        $municipalityList = $this->residents['province'] != null ?  MunicipalityModel::where('region_id', $this->residents['region'])->where('province_id', $this->residents['province'])->get() : [];
        $barangayList = $this->residents['municipality'] != null ? BarangayModel::where('region_id', $this->residents['region'])->where('province_id', $this->residents['province'])->where('municipality_id', $this->residents['municipality'])->get() : [];
        //$this->residentLists = $this->searchInput != null && $this->residents['region'] != null ? $this->resident_list($this->searchInput) :  ResidentModel::where('is_removed', false)->limit('20')->orderBy('id', 'desc')->get();
        $this->residentLists = $this->resident_list($this->searchInput);
        return view('livewire.resident-view', compact('regionList', 'provinceList', 'municipalityList', 'barangayList'));
    }
    public function generateFakeData()
    {
        $fakeResident = new AddInformation();
        $residentCount = 10;
        for ($i = 0; $i < $residentCount; $i++) {
            $fakeResident->generateFakeData();
        }
        return back();
    }
    function resident_list($searchInput)
    {
        $dataLists = ResidentModel::select('*')
            ->join('resident_address_models', 'resident_address_models.resident_id', 'resident_models.id')
            ->where('resident_address_models.region_id', Auth::user()->user_address->region_id)
            ->where('resident_address_models.barangay_id', Auth::user()->user_address->barangay_id);
        if ($this->filter['gender']) {
            $dataLists->where('resident_models.sex', $this->filter['gender']);
        }
        if ($this->filter['civil_status']) {
            $dataLists->where('resident_models.civil_status', $this->filter['civil_status']);
        }

        if ($searchInput != '') {

            $data = explode(',', $searchInput); // Seperate the Sentence
            $_count = count($data);

            if ($_count > 1) {
                $dataLists = $dataLists->where('last_name', 'like', '%' . $data[0] . '%')
                    ->where('first_name', 'like', '%' . trim($data[1]) . '%')
                    ->orderBy('last_name', 'asc');
            } else {
                $dataLists = $dataLists->where('last_name', 'like', '%' . $data[0] . '%')
                    ->orderBy('last_name', 'asc');
            }
        }
        return $dataLists->get();
    }
    function auto()
    {
    }
    function selectAddress()
    {
    }
}
