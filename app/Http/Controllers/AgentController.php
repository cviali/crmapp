<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:agent');
        $this->middleware('ipcheck');
    }

    public function password(Request $request)
    {
        // cek akun
        if (Auth::user()->id != User::where('id', $request->id)->first()->id) {
            session()->flash('err', 'Anda tidak dapat mengganti password user tersebut.');
            return redirect()->route('agent-home');
        }
        User::where('id', $request->id)->update(['password' => bcrypt($request->password)]);
        session()->flash('msg', 'Password berhasil diupdate.');
        return redirect()->route('agent-home');
    }

    public function index()
    {
        $currentHandler = Auth::user();
        $customer = Customer::where([['handler_id', '=', $currentHandler->id], ['status_id', '=', 1], ['deleted_at', '=', null]])
            ->first();
        if ($customer == null) {
            $customer = Customer::where([['status_id', '=', 0], ['deleted_at', '=', null]])
                ->first();
            $handler = $currentHandler;
            return view('agent.home', compact('customer', 'handler'));
        };
        // dd(str_starts_with($customer->phone, '62'));
        $handler = $customer->handler_id != null ? User::where('id', '=', $customer->handler_id)->first() : null;
        return view('agent.home', compact('customer', 'handler'));
    }
}
