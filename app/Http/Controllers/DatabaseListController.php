<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class DatabaseListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('ipcheck');
    }

    public function index()
    {
        $sources = Customer::where('deleted_at', null)->distinct()->get(['source']);
        return view('admin.databaselist')->with(compact('sources'));
    }
}
