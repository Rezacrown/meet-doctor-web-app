<?php

namespace App\Exports;

use App\Models\Operational\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppointmentExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Appointment::orderBy('created_at', 'desc')->get();
    }
}
