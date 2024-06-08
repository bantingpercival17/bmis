<?php

namespace App\Http\Controllers;

use App\Models\BarangayClearance;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class GenerateReports extends Controller
{

    public $legal = [0, 0, 612.00, 1008.00];
    public $path = "reports";
    function barangay_clearance(Request $request)
    {

        try {
            $barangay_clearance = BarangayClearance::find(base64_decode($request->bc));
            $pdf = PDF::loadView($this->path . ".barangay-clearance", compact('barangay_clearance'));
            $file_name = 'BARANGAY CLEARANCE - ' . strtoupper($barangay_clearance->resident->complete_name());
            return $pdf->setPaper($this->legal, 'portrait')->stream($file_name . '.pdf');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
