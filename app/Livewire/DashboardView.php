<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardView extends Component
{
    public $header;

    public function mount()
    {
        $this->header = 'Dashboard';
    }
    public function render()
    {

        return view('livewire.dashboard-view');
    }
}
