<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:agent');
    }

    public function index()
    {
        $currentHandler = Auth::user();
        $customer = Customer::where([['handler_id', '=', $currentHandler->id], ['status_id', '=', 1]])
            ->first();
        if ($customer == null) {
            $customer = Customer::where([['status_id', '=', 0]])
                ->first();
            return view('agent.home', compact('customer'));
        };
        $handler = $customer->handler_id != null ? User::where('id', '=', $customer->handler_id)->first() : null;
        return view('agent.home', compact('customer', 'handler'));
    }
}
