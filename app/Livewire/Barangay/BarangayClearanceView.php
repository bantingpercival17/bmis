<?php

namespace App\Livewire\Barangay;

use App\Models\BarangayClearance;
use App\Models\ResidentModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BarangayClearanceView extends Component
{
    public $filter = false;
    public $profile = false;
    public $residentProfile = null;
    public $findResident = null;

    public $clearance = array(
        'propose' => '',
        'occupation' => '',
        'length_of_residency' => '',
        'identification_id_type' => '',
        'identification_id_number' => '',
        'identification_issuing_agency' => '',
    );
    protected $rules = [
        'clearance.propose' => 'required',
        'clearance.occupation' => 'required',
        'clearance.length_of_residency' => 'required',
        'clearance.identification_id_type' => 'required',
        'clearance.identification_id_number' => 'required',
        'clearance.identification_issuing_agency' => 'required',
    ];
    public function render()
    {
        $findResidents = $this->resident_list($this->findResident);

        if (request()->query('resident')) {
            $this->residentProfile = ResidentModel::find(base64_decode(request()->query('resident')));
            $this->profile = true;
        }
        $barangayClearanceList = BarangayClearance::select('barangay_clearances.*')
            ->join('resident_address_models' , 'resident_address_models.id', 'barangay_clearances.resident_address_id')
            ->where('resident_address_models.barangay_id', Auth::user()->user_address->barangay_id)
            ->limit(10)->orderByDesc('id')->get();

            return view('livewire.barangay.barangay-clearance-view', compact('findResidents', 'barangayClearanceList'));
    }
    function auto()
    {
    }
    function resident_list($searchInput)
    {
        $dataLists = ResidentModel::select('resident_models.*')
            ->join('resident_address_models', 'resident_address_models.resident_id', 'resident_models.id')
            ->where('resident_address_models.region_id', Auth::user()->user_address->region_id)
            ->where('resident_address_models.barangay_id', Auth::user()->user_address->barangay_id);
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
    public function submitForm()
    {
        $this->validate();
        try {
            $data = array(
                'resident_id' => $this->residentProfile->id,
                'resident_address_id' => $this->residentProfile->address->id,
                'propose' => $this->clearance['propose'],
                'occupation' => $this->clearance['occupation'],
                'length_of_residency' => $this->clearance['length_of_residency'],
                'identification_id_type' => $this->clearance['identification_id_type'],
                'identification_id_number' => $this->clearance['identification_id_number'],
                'identification_issuing_agency' => $this->clearance['identification_issuing_agency'],
                'created_by' => Auth::user()->id
            );
            BarangayClearance::create($data);
            $this->reset(['clearance']);
            return redirect(route('barangay-clearance.view'));
        } catch (\Throwable $th) {
            $this->addError('formError', $th->getMessage());
            #return response(['errors' => ['bugs' => $th->getMessage()]], 402);
        }
    }
}
