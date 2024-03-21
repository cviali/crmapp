<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'string', 'max:20', 'unique:customers'],
        ]);
    }

    public function addCustomer(Request $request)
    {
        $this->validator($request->all())->validate();

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'source' => 'Admin',
            'status_id' => 0
        ]);

        session()->flash('msg', 'Data customer berhasil ditambahkan.');
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.home');
    }
}
