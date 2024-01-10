<?php

namespace App\Livewire\Resident;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\RegionModel;
use App\Models\ResidentAddressModel;
use App\Models\ResidentModel;
use Livewire\Component;

class ViewInformation extends Component
{
    public $data;
    public $updateForm = false;
    public $addressForm = false;
    public $input = 'disabled';
    public $searchInput = null;

    public $residents = array(
        'id' => null,
        'first_name' => '', 'last_name' => '', 'middle_name' => '', 'extension_name' => '',
        'birth_date' => '',
        'birth_place' => '',
        'sex' => '',
        'civil_status' => '',
        'contact_number' => '',

    );
    public $address = array('region' => null, 'province' => null, 'municipality' => null, 'barangay' => null, 'street' => '');
    protected $rules = [
        'residents.first_name' => 'required|string',
        'residents.last_name' => 'required|string',
        'residents.birth_date' => 'required',
        'residents.birth_place' => 'required',
        'residents.sex' => 'required',
        'residents.civil_status' => 'required',

    ];
    public function mount($data)
    {
        $this->data = $data;
    }
    public function render()
    {
        // Address Details
        $regionList = RegionModel::all();
        $provinceList = [];
        if ($this->address['region'] != null) {
            $region = RegionModel::find($this->address['region']);
            $provinceList = $region->provinces;
        }
        $municipalityList = $this->address['province'] != null ?  MunicipalityModel::where('region_id', $this->address['region'])->where('province_id', $this->address['province'])->get() : [];
        $barangayList = $this->address['municipality'] != null ? BarangayModel::where('region_id', $this->address['region'])->where('province_id', $this->address['province'])->where('municipality_id', $this->address['municipality'])->get() : [];

        // /AddressDetails
        $resident = ResidentModel::find(base64_decode($this->data));
        $this->resident_information($resident);
        $residentList = $this->searchInput != null ? $this->resident_list($this->searchInput) : [];
        return view('livewire.resident.view-information', compact('resident', 'residentList', 'regionList', 'provinceList', 'municipalityList', 'barangayList'));
    }
    function resident_list($searchInput)
    {
        if ($searchInput != '') {
            $dataLists = ResidentModel::select('*');
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
            return $dataLists->get();
        }
    }
    function updateInfo()
    {
        if (!$this->updateForm) {
            $this->updateForm = true;
            $this->input = '';
        } else {
            $this->updateForm = false;
            $this->input = 'disabled';
        }
    }
    function addAddress()
    {

        $this->addressForm = $this->addressForm ? false : true;
    }
    function resident_information($resident)
    {
        $this->residents['id'] = $resident->id;
        $this->residents['first_name'] = $resident->first_name;
        $this->residents['last_name'] = $resident->last_name;
        $this->residents['middle_name'] = $resident->middle_name;
        $this->residents['extension_name'] = $resident->extension_name;
        $this->residents['sex'] = $resident->sex;
        $this->residents['civil_status'] = $resident->civil_status;
        $this->residents['birth_date'] = $resident->birth_date;
        $this->residents['birth_place'] = $resident->birth_place;
        $this->residents['contact_number'] = $resident->contact_number;
    }
    function updateInformation()
    {
        $data = array(
            'first_name' => ucwords(strtolower(trim($this->residents['first_name']))),
            'last_name' => ucwords(strtolower(trim($this->residents['last_name']))),
            'middle_name' => ucwords(strtolower(trim($this->residents['middle_name']))),
            'extension_name' => ucwords(strtolower(trim($this->residents['extension_name']))),
            'birth_date' => $this->residents['birth_date'],
            'birth_place' => $this->residents['birth_place'],
            'sex' => $this->residents['sex'],
            'religion' => '',
            'civil_status' => $this->residents['civil_status'],
            'contact_number' => $this->residents['contact_number']
        );
        ResidentModel::find($this->residents['id'])->update($data);
        $this->updateForm = false;
        $this->input = 'disabled';
        return back()->with(['information_message' => 'Updated Information Successfully.']);
    }
    function selectAddress()
    {
    }
    function storeAddress()
    {
        $this->validate([
            'address.region' => 'required',
            'address.province' => 'required',
            'address.municipality' => 'required',
            'address.barangay' => 'required',
            'address.street' => 'required',
        ]);
        $permanentAddressData = array(
            'resident_id' => $this->residents['id'],
            'region_id' => $this->address['region'],
            'province_id' => $this->address['province'],
            'municipality_id' => $this->address['municipality'],
            'barangay_id' => $this->address['barangay'],
            'street' => $this->address['street'],
        );
        ResidentAddressModel::create($permanentAddressData);
        $this->addressForm = false;
        return back()->with(['address_message' => 'Address Successfully Added.']);
    }
}
