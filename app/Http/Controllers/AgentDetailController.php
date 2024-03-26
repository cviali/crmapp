<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Carbon\Carbon;

class AgentDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index($id)
    {
        $date = Carbon::today();
        $agent = User::where('id', '=', $id)->first();
        $data = Customer::where([['handler_id', '=', $id], ['updated_at', '>', $date]])->get();
        // dd($date);
        $total = $data->count();
        $inprogress = $data->where('status_id', '=', 1)->count();
        $active = $data->where('status_id', '=', 2)->count();
        $inactive = $data->where('status_id', '=', 3)->count();
        $notinterested = $data->where('status_id', '=', 4)->count();
        return view('admin.agentdetail')->with(compact('agent', 'date', 'total', 'inprogress', 'active', 'inactive', 'notinterested'));
    }
}