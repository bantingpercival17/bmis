<?php

namespace App\Livewire;

use App\Livewire\Resident\AddInformation;
use App\Models\ResidentModel;
use Livewire\Component;

class ResidentView extends Component
{
    public $residentLists;
    protected $listeners = ['tableRefresh' => 'refreshTable'];
    public $searchInput = null;
    public function render()
    {
        $this->residentLists = $this->searchInput != null ? $this->resident_list($this->searchInput) :  ResidentModel::where('is_removed', false)->limit('20')->orderBy('id', 'desc')->get();
        return view('livewire.resident-view');
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
    function auto(){

    }
}
