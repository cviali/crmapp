<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //status_id: 0 = belum dikontak, 1 = sedang dikontak, 2 = aktif, 3 = tidak aktif, 4 = tidak berminat
    public function startContact(Request $request)
    {
        $handler = Auth::user();
        $customer = Customer::where([['id', '=', $request->id]])->first();
        $customer->update(['status_id' => 1]);
        $customer->update(['handler_id' => $handler->id]);
        // dd($customer);

        return redirect()->back();
    }

    public function updateContact(Request $request)
    {
        $customer = Customer::where([['id', '=', $request->id]])->first();
        $customer->update(['status_id' => $request->status]);
        if ($request->notes != null) $customer->update(['notes' => $request->notes]);

        return redirect()->back();
    }
}
