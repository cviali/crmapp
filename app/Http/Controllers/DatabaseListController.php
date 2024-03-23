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
    }

    public function index()
    {
        $sources = Customer::distinct()->get(['source']);
        return view('admin.databaselist')->with(compact('sources'));
    }
}
