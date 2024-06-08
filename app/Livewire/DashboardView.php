<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
        $barangay = Auth::user()->user_address->barangay;
        $location = Auth::user()->user_address;
        $address = $location->barangay->barangay_name . ", " . $location->municipality->municipality_name . ", " . $location->province->province_name . ', Philippines';
        $coordinates = $this->getCoordinates($address);
        return view('livewire.dashboard-view', compact('barangay', 'address', 'coordinates'));
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
            return response()->json([
                'latitude' => $latitude,
                'longitude' => $longitude
            ]);
        } else {
            // Return an error if the response is not valid
            return response()->json([
                'error' => 'Unable to geocode the address'
            ], 400);
        }
    }
}
