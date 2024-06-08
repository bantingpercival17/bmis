<?php

namespace App\Livewire\Resident;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\ProvinceModel;
use App\Models\RegionModel;
use App\Models\ResidentAddressModel;
use App\Models\ResidentModel;
use Livewire\Component;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Auth;

class AddInformation extends Component
{
    public $residents = array(
        'first_name' => '', 'last_name' => '', 'middle_name' => '', 'extension_name' => '',
        'birth_date' => '',
        'birth_place' => '',
        'sex' => '',
        'civil_status' => '',
        'contact_number' => '',
        'region' =>  null,
        'province' =>  null,
        'municipality' =>  null,
        'barangay' =>  null,
        'street' => ''
    );

    public $successMessage;
    protected $rules = [
        'residents.first_name' => 'required|string',
        'residents.last_name' => 'required|string',
        'residents.birth_date' => 'required',
        'residents.birth_place' => 'required',
        'residents.sex' => 'required',
        'residents.civil_status' => 'required',
        'residents.region' => 'required',
        'residents.province' => 'required',
        'residents.municipality' => 'required',
        'residents.barangay' => 'required',
        'residents.street' => 'required',
    ];
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
        return view('livewire.resident.add-information', compact('regionList', 'provinceList', 'municipalityList', 'barangayList'));
    }
    public function submitForm()
    {
        $this->validate();
        try {

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
                'contact_number' => $this->residents['contact_number'],
                'created_by' => Auth::user()->id
            );

            $resident = ResidentModel::create($data);

            // Permenent Address
            $permanentAddressData = array(
                'resident_id' => $resident->id,
                'region_id' => $this->residents['region'],
                'province_id' => $this->residents['province'],
                'municipality_id' => $this->residents['municipality'],
                'barangay_id' => $this->residents['barangay'],
                'street' => $this->residents['street'],
            );
            ResidentAddressModel::create($permanentAddressData);
            $this->reset(['residents']);
            return redirect(route('resident'));
        } catch (\Throwable $th) {
            $this->addError('formError', $th->getMessage());
            #return response(['errors' => ['bugs' => $th->getMessage()]], 402);
        }
    }
    function selectAddress()
    {
    }
    function generateFakeData()
    {
        $faker = FakerFactory::create();

        $data = [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'middle_name' => $faker->firstName,
            'extension_name' => $faker->suffix,
            'birth_date' => $faker->date,
            'birth_place' => $faker->city,
            'sex' => $faker->randomElement(['Male', 'Female']),
            'civil_status' => $faker->randomElement(['Single', 'Married', 'Divorced']),
            'religion' => '',
            'contact_number' => $faker->phoneNumber,
            'created_by' => Auth::user()->id
        ];
        $residentModel = ResidentModel::create($data);
        # Get User Account Address
        $address = Auth::user()->user_address;
        // Set Fake Address
        $permanentAddressData = array(
            'resident_id' => $residentModel->id,
            'region_id' => $address->region_id,
            'province_id' => $address->province_id,
            'municipality_id' => $address->municipality_id,
            'barangay_id' => $address->barangay_id,
            'street' =>  $faker->streetAddress,
            'created_by' => Auth::user()->id
        );
        /* $region = RegionModel::select('id')->get();
        $regionList = [];
        foreach ($region as $key => $value) {
            array_push($regionList, $value->id);
        }
        $region = $faker->randomElement($regionList);
        $permanentAddressData['region_id'] = $region;
        // Province
        $province = ProvinceModel::select('id')->where('region_id', $region)->get();
        $provinceList = [];
        foreach ($province as $key => $value) {
            array_push($provinceList, $value->id);
        }
        $province = $faker->randomElements($provinceList);
        $permanentAddressData['province_id'] = $province[0];
        // Municipality
        $municipality = MunicipalityModel::select('id')->where('province_id', $province[0])->get();
        $municipalityList = [];
        foreach ($municipality as $key => $value) {
            array_push($municipalityList, $value->id);
        }
        $municipality = $faker->randomElements($municipalityList);
        $permanentAddressData['municipality_id'] = $municipality[0]; */
        //Barangay
        /*  $barangay = BarangayModel::select('id')->where('municipality_id', $permanentAddressData['municipality_id'])->get();
        $barangayList = [];
        foreach ($barangay as $key => $value) {
            array_push($barangayList, $value->id);
        }
        $barangay = $faker->randomElements($barangayList);
        $permanentAddressData['barangay_id'] = $barangay[0]; */
        #return dd($permanentAddressData);
        ResidentAddressModel::create($permanentAddressData);
    }
}
