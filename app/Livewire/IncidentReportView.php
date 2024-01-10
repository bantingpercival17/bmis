<?php

namespace App\Livewire;


use Livewire\Component;

class IncidentReportView extends Component
{
    public function render()
    {

        $dataList = [];
        return view('livewire.incident-report-view', compact('dataList'));
    }
}
