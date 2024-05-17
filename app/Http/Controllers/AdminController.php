<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Imports\CustomerImportClass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        // $this->middleware('ipcheck');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
        ]);
    }

    public function password(Request $request)
    {
        User::where('id', $request->id)->update(['password' => bcrypt($request->password)]);
        session()->flash('msg', 'Password berhasil diupdate.');
        return redirect()->route('admin-home');
    }


    public function addCustomer(Request $request)
    {
        $this->validator($request->all())->validate();

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'source' => 'manual',
            'status_id' => 0
        ]);

        session()->flash('msg', 'Data customer berhasil ditambahkan.');
        return redirect()->back();
    }

    public function index()
    {
        $admin = Auth::user();
        return view('admin.home', with(compact('admin')));
    }
}
