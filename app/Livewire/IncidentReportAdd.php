<?php

namespace App\Livewire;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\RegionModel;
use Livewire\Component;

class IncidentReportAdd extends Component
{
    public $residents = array(
        'first_name' => '', 'last_name' => '', 'middle_name' => '', 'extension_name' => '',
        'birth_date' => '',
        'birth_place' => '',
        'sex' => '',
        'civil_status' => '',
        'contact_number' => '',
        'region' => null, 'province' => null, 'municipality' => null, 'barangay' => null, 'street' => ''
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

        return view('livewire.incident-report-add', compact('regionList', 'provinceList', 'municipalityList', 'barangayList'));
    }
}
