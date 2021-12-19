<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\getNotificatios;

class ExportpdfController extends Controller
{
    //

    public function pdf()
    {
        $data = getNotificatios::all();
        $pdf = PDF::loadView('pdf',compact('data'));
        return $pdf->downloas('document.pdf');
    }
}
