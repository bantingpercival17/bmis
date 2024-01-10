?php

namespace App\Livewire\Resident;

use App\Models\ResidentModel;
use Livewire\Component;

class AddResidentInformation extends Component
{
    public $first_name;
    public $last_name;
    public $middle_name;
    public $extension_name;
    public $birth_date;
    public $birth_place;
    public $sex;
    public $civil_status;
    public $contact_number;
    public $successMessage;
    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'birth_date' => 'required',
        'birth_place' => 'required',
        'sex' => 'required',
        'civil_status' => 'required'
    ];
    public function render()
    {
        return view('livewire.resident.add-resident-information');
    }
    public function submitForm()
    {
        $this->validate();
        try {

            $data = array(
                'first_name' => ucwords(strtolower(trim($this->first_name))),
                'last_name' => ucwords(strtolower(trim($this->last_name))),
                'middle_name' => ucwords(strtolower(trim($this->middle_name))),
                'extension_name' => ucwords(strtolower(trim($this->extension_name))),
                'birth_date' => $this->birth_date,
                'birth_place' => $this->birth_place,
                'sex' => $this->sex,
                'religion' => '',
                'civil_status' => $this->civil_status,
                'contact_number' => $this->contact_number
            );
           # $resident = ResidentModel::create($data);


            $this->reset();
            $this->successMessage = 'Successfully Added.';
        } catch (\Throwable $th) {
            $this->addError('formError', $th->getMessage());
            #return response(['errors' => ['bugs' => $th->getMessage()]], 402);
        }
    }
}
