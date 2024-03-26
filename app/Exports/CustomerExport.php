<?php

namespace App\Exports;

use App\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExport implements FromView
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function view(): View
    {
        // dd($this->name);
        return view('exports.customers', [
            'customers' => Customer::where('source', '=', $this->name)->get()
        ]);
    }
}
