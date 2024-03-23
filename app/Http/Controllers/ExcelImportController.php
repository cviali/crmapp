<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImportClass;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new CustomerImportClass($request->source), $file);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }
}
