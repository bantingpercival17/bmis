<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Providers\FilipinoNameProvider;
use Faker\Factory as FakerFactory;

class DashboardView extends Component
{
    public $header;

    public function mount()
    {
        $this->header = 'Dashboard';
    }
    public function render()
    {
        $barangay = Auth::user()->user_address->barangay;
        $location = Auth::user()->user_address;
        $address = $location->barangay->barangay_name . ", " . $location->municipality->municipality_name . ", " . $location->province->province_name . ', Philippines';
        $coordinates = $this->getCoordinates($address);
        $bbox = '';
        $marker = '';
        if ($coordinates[0] === 200) {
            $adjust = 0.001;
            $bbox = $coordinates['data']['longitude'] - $adjust . ',' . $coordinates['data']['latitude'] - $adjust . ',' . $coordinates['data']['longitude'] + $adjust . ',' . $coordinates['data']['latitude'] + $adjust;
            $marker = $coordinates['data']['latitude'] . ',' . $coordinates['data']['longitude'];
        }
        $barangayOfficials = $this->barangayOfficals();
        # https://www.openstreetmap.org/export/embed.html?bbox=120.915591,14.9418958,120.925591,14.9618958&layer=mapnik&marker=14.9518958,120.925591
        return view('livewire.dashboard-view', compact('barangay', 'address', 'bbox', 'marker', 'barangayOfficials'));
    }

    public function getCoordinates($address)
    {
        // Nominatim API endpoint
        $url = "https://nominatim.openstreetmap.org/search";

        // Create the request URL
        $requestUrl = "{$url}?q=" . urlencode($address) . "&format=json&limit=1";

        // Make the HTTP request
        $response = Http::get($requestUrl);

        // Check if the response is valid
        if ($response->successful() && !empty($response->json())) {
            $responseData = $response->json();
            // Get the latitude and longitude from the response
            $latitude = $responseData[0]['lat'];
            $longitude = $responseData[0]['lon'];

            // Return the coordinates
            return array('data' => array(
                'latitude' => $latitude,
                'longitude' => $longitude
            ), 200);
        } else {
            // Return an error if the response is not valid
            return array('data' => 'Unable to geocode the address', 404);
        }
    }
    function barangayOfficals()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new FilipinoNameProvider($faker));
        $fullname = $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName();
        $offical = array(
            array(
                'name' => $fullname,
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Punong Barangay',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'Sangguniang Barangay Member',
            ),
            array(
                'name' => $faker->filipinoName('Male') . ' ' . $faker->filipinoLastName(),
                'image' => asset('/assets/avatar/avatar (' . rand(1, 20) . ').png'),
                'position' => 'SK Chairperson',
            ),

        );

        return $offical;
    }
}
