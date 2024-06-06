<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\RegionModel;
use App\Models\ProvinceModel;
use App\Models\MunicipalityModel;
use App\Models\BarangayModel;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = Http::withOptions([
            'ssl_version' => CURL_SSLVERSION_TLSv1_2,
            'timeout' => 3600
        ])->get('https://psgc.gitlab.io/api/regions/');
        $regions = json_decode($regions);

        foreach ($regions as $region) {
            $regionModel = RegionModel::where('region_name', $region->name)->first();
            $dataRegion = [
                'region_name' => $region->name,
                'abbreviation' => $region->regionName,
                'region_sort' => $region->code
            ];
            if (!$regionModel) {
                $regionModel = RegionModel::create($dataRegion);
            }

            // Call Province
            $provinces = Http::withOptions([
                'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                'timeout' => 3600
            ])->get('https://psgc.gitlab.io/api/regions/' . $region->code . '/provinces/');
            $provinces = json_decode($provinces);

            foreach ($provinces as $province) {
                $provinceModel = ProvinceModel::where('region_id', $regionModel->id)->where('province_name', $province->name)->first();
                $provinceData = [
                    'region_id' => $regionModel->id,
                    'province_name' => $province->name
                ];
                if (!$provinceModel) {
                    $provinceModel = ProvinceModel::create($provinceData);
                }

                // Call Cities/Municipalities
                $cities = Http::withOptions([
                    'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                    'timeout' => 3600
                ])->get('https://psgc.gitlab.io/api/provinces/' . $province->code . '/cities-municipalities/');
                $cities = json_decode($cities);

                foreach ($cities as $city) {
                    $citiesModel = MunicipalityModel::where([
                        'region_id' => $regionModel->id,
                        'province_id' => $provinceModel->id,
                        'municipality_name' => $city->name,
                        'lgu_type' => $city->isCity,
                    ])->first();
                    $citiesData = [
                        'region_id' => $regionModel->id,
                        'province_id' => $provinceModel->id,
                        'municipality_name' => $city->name,
                        'lgu_type' => $city->isCity,
                    ];
                    if (!$citiesModel) {
                        $citiesModel = MunicipalityModel::create($citiesData);
                    }

                    // Barangay Details
                    $barangay = Http::withOptions([
                        'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                        'timeout' => 3600
                    ])->get('https://psgc.gitlab.io/api/cities-municipalities/' . $city->code . '/barangays');
                    $barangay = json_decode($barangay);

                    foreach ($barangay as $value) {
                        $barangayModel = BarangayModel::where([
                            'region_id' => $regionModel->id,
                            'province_id' => $provinceModel->id,
                            'municipality_id' => $citiesModel->id,
                            'barangay_name' => $value->name
                        ])->first();
                        $barangayData = [
                            'region_id' => $regionModel->id,
                            'province_id' => $provinceModel->id,
                            'municipality_id' => $citiesModel->id,
                            'barangay_name' => $value->name
                        ];
                        if (!$barangayModel) {
                            BarangayModel::create($barangayData);
                        }
                    }
                }
            }
        }
    }
}
