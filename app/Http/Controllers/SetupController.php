<?php

namespace App\Http\Controllers;

use App\Models\BarangayModel;
use App\Models\MunicipalityModel;
use App\Models\ProvinceModel;
use App\Models\RegionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SetupController extends Controller
{
    function setup_address(Request $request)
    {
        // Call Region
        $regions =  Http::withOptions([
            'ssl_version' => CURL_SSLVERSION_TLSv1_2,
            'timeout' => 3600
        ])->get('https://psgc.gitlab.io/api/regions/');
        $regions = json_decode($regions);
        echo "<ul>";
        foreach ($regions as $region) {
            echo "<li>" . $region->regionName . ' - ' . $region->name . '</li>';
            $regionModel = RegionModel::where('region_name', $region->name)->first();
            $dataRegion = array(
                'region_name' => $region->name, 'abbreviation' => $region->regionName, 'region_sort' => $region->code
            );
            if (!$regionModel) {
                $regionModel = RegionModel::create($dataRegion);
            }
            // Call Province
            $provinces = Http::withOptions([
                'ssl_version' => CURL_SSLVERSION_TLSv1_2,
                'timeout' => 3600
            ])->get('https://psgc.gitlab.io/api/regions/' . $region->code . '/provinces/');
            $provinces = json_decode($provinces);
            echo "<ol>";
            foreach ($provinces as $key => $province) {
                echo "<li>" . $province->name . "</li>";
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
                echo "<ul>";
                foreach ($cities as $key => $city) {
                    echo "<li>" . $city->name . "</li>";
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
                    echo "<ol>";
                    foreach ($barangay as $key => $value) {
                        echo "<li>" . $value->name . "</li>";
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
                    echo "</ol>";
                }
                echo "</ul>";
            }
            echo "</ol>";
        }
        echo "<ul>";
        return redirect(route('register'));
        //$regions = RegionModel::all();
        //return view('set-up', compact('regions'));
        //return $region;
    }
    function setup_provinces(Request $request)
    {
        try {
            $provinces = Http::get('https://psgc.gitlab.io/api/regions/' . $request->region . '/provinces/');
            $provinces = json_decode($provinces);
            $region = RegionModel::where('region_sort', $request->region)->first();
            foreach ($provinces as $key => $province) {
                echo json_encode($province) . "<br>";
                #$provinceModel = ProvinceModel::create();
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
