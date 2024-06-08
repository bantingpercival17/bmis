<?php

namespace App\Livewire\Administrator;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\ProvinceModel;
use App\Models\RegionModel;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Regions extends Component
{
    public $alertMessage = [];
    public function render()
    {
        $regionList = Http::withOptions([
            'ssl_version' => CURL_SSLVERSION_TLSv1_2,
            'timeout' => 3600
        ])->get('https://psgc.gitlab.io/api/regions/');
        $regionList = json_decode($regionList);
        return view('livewire.administrator.regions', compact('regionList'));
    }
    public function storeRegion($data)
    {
        try {
            $region = Http::withOptions([
                'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                'timeout' => 3600
            ])->get('https://psgc.gitlab.io/api/regions/' . $data);
            $region = json_decode($region);
            $regionModel = RegionModel::where('region_name', $region->name)->first();
            $dataRegion = array(
                'region_name' => $region->name, 'abbreviation' => $region->regionName, 'region_sort' => $region->code
            );
            # Store Region
            if (!$regionModel) {
                $regionModel = RegionModel::create($dataRegion);
            }
            // STORE PROVINCE
            $provinces = Http::withOptions([
                'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                'timeout' => 3600
            ])->get('https://psgc.gitlab.io/api/regions/' . $region->code . '/provinces/');
            $provinces = json_decode($provinces);

            foreach ($provinces as $key => $province) {
                $provinceModel = ProvinceModel::where('region_id', $regionModel->id)->where('province_name', $province->name)->first();
                $provinceData = array(
                    'region_id' => $regionModel->id,
                    'province_name' => $province->name
                );
                if (!$provinceModel) {
                    $provinceModel = ProvinceModel::create($provinceData);
                }
                $cities = Http::withOptions([
                    'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                    'timeout' => 3600
                ])->get('https://psgc.gitlab.io/api/provinces/' . $province->code . '/cities-municipalities/');
                $cities = json_decode($cities);
                foreach ($cities as $key => $city) {
                    $citiesModel = MunicipalityModel::where([
                        'region_id' => $regionModel->id,
                        'province_id' => $provinceModel->id,
                        'municipality_name' => $city->name,
                        'lgu_type' => $city->isCity,
                    ])->first();
                    $citiesData = array(
                        'region_id' => $regionModel->id,
                        'province_id' => $provinceModel->id,
                        'municipality_name' => $city->name,
                        'lgu_type' => $city->isCity,
                    );
                    if (!$citiesModel) {
                        $citiesModel = MunicipalityModel::create($citiesData);
                    }
                    // Barangay Details
                    $barangay = Http::withOptions([
                        'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                        'timeout' => 3600
                    ])->get('https://psgc.gitlab.io/api/cities-municipalities/' . $city->code . '/barangays');
                    $barangay = json_decode($barangay);
                    foreach ($barangay as $key => $value) {
                        $barangayModel = BarangayModel::where([
                            'region_id' => $regionModel->id,
                            'province_id' => $provinceModel->id,
                            'municipality_id' => $citiesModel->id,
                            'barangay_name' => $value->name
                        ])->first();
                        $barangayData = array(
                            'region_id' => $regionModel->id,
                            'province_id' => $provinceModel->id,
                            'municipality_id' => $citiesModel->id,
                            'barangay_name' => $value->name
                        );
                        if (!$barangayModel) {
                            BarangayModel::create($barangayData);
                        }
                    }
                }
            }
            $this->alertMessage = ['message' => 'Successfully Created Region and Province', 200];
        } catch (\Throwable $th) {
            $this->alertMessage = ['message' => $th->getMessage(), 404];
        }
    }
    function closeAlert()
    {
        $this->alertMessage = [];
    }
}
