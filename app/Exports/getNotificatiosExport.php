<?php

namespace App\Exports;

use App\Models\getNotificatios;
use Maatwebsite\Excel\Concerns\FromCollection;

class getNotificatiosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return getNotificatios::select('mobileNumber')->get();
    }
}
