<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;

class AgentDetailController extends Controller
{
    public function index($id)
    {
        $agent = User::where('id', '=', $id)->first();
        $data = Customer::where('handler_id', '=', $id)->get();
        $total = $data->count();
        $inprogress = $data->where('status_id', '=', 1)->count();
        $active = $data->where('status_id', '=', 2)->count();
        $inactive = $data->where('status_id', '=', 3)->count();
        $notinterested = $data->where('status_id', '=', 4)->count();
        return view('admin.agentdetail')->with(compact('agent', 'total', 'inprogress', 'active', 'inactive', 'notinterested'));
    }
}
