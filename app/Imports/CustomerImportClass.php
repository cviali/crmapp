<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImportClass implements ToModel
{
    public function  __construct($source)
    {
        $this->source = $source;
    }

    public function model(array $row)
    {
        return new Customer([
            'name' => $row[0],
            'phone' => $row[1],
            'source' => $this->source,
            'status_id' => 0
        ]);
    }
}
