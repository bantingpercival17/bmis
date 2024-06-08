<?php

namespace App\Livewire\Administrator;

use App\Models\ProvinceModel;
use App\Models\RegionModel;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ProvinceView extends Component
{
    public $alertMessage = [];
    public $region_name = null;

    public function render()
    {
        $region = Http::withOptions([
            'ssl_version' => CURL_SSLVERSION_TLSv1_2,
            'timeout' => 3600
        ])->get('https://psgc.gitlab.io/api/regions/' . base64_decode(request()->query('rCode')));
        $region = json_decode($region);
        $this->region_name = $region->name;
        $provinces = Http::withOptions([
            'ssl_version' => CURL_SSLVERSION_TLSv1_2,
            'timeout' => 3600
        ])->get('https://psgc.gitlab.io/api/regions/' . $region->code . '/provinces/');
        $provinces = json_decode($provinces);
        $dataLists = $provinces;
        return view('livewire.administrator.province-view', compact('dataLists'));
    }
}
