<?php

namespace App\Exports;

use App\Models\Operational\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::orderBy('created_at', 'desc')->get();
    }
}
