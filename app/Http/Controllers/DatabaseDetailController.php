<?php

namespace App\Http\Controllers;

use App\Customer;

class DatabaseDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index($source)
    {
        $data = Customer::where('source', '=', $source)->get();
        $total = $data->count();
        $inprogress = $data->where('status_id', '=', 1)->count();
        $active = $data->where('status_id', '=', 2)->count();
        $inactive = $data->where('status_id', '=', 3)->count();
        $notinterested = $data->where('status_id', '=', 4)->count();
        return view('admin.databasedetail')->with(compact('source', 'total', 'inprogress', 'active', 'inactive', 'notinterested'));
    }
}
