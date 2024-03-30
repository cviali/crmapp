<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgentDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('ipcheck');
    }

    public function delete(Request $request)
    {
        User::where('id', $request->id)->update(['deleted_at' => Carbon::now()]);
        session()->flash('msg', 'Agent berhasil dihapus.');
        return redirect()->route('agent-list');
    }

    public function password(Request $request)
    {
        User::where('id', $request->id)->update(['password' => bcrypt($request->password)]);
        session()->flash('msg', 'Password agent berhasil diupdate.');
        return redirect()->route('agent-list');
    }

    public function filter(Request $request)
    {
        $date = Carbon::parse($request->date);
        $maxDate = Carbon::today();
        $agent = User::where('id', '=', $request->id)->first();
        $data = Customer::whereDate('updated_at', '=', $date)->where([['handler_id', '=', $request->id]])->get();
        $total = $data->count();
        $inprogress = $data->where('status_id', '=', 1)->count();
        $active = $data->where('status_id', '=', 2)->count();
        $inactive = $data->where('status_id', '=', 3)->count();
        $notinterested = $data->where('status_id', '=', 4)->count();
        return view('admin.agentdetail')->with(compact('agent', 'date', 'maxDate', 'total', 'inprogress', 'active', 'inactive', 'notinterested'));
    }

    public function index($id)
    {
        $date = Carbon::today();
        $maxDate = Carbon::today();
        $agent = User::where('id', '=', $id)->first();
        $data = Customer::whereDate('updated_at', '=', $date)->where([['handler_id', '=', $id]])->get();
        $total = $data->count();
        $inprogress = $data->where('status_id', '=', 1)->count();
        $active = $data->where('status_id', '=', 2)->count();
        $inactive = $data->where('status_id', '=', 3)->count();
        $notinterested = $data->where('status_id', '=', 4)->count();
        return view('admin.agentdetail')->with(compact('agent', 'date', 'maxDate', 'total', 'inprogress', 'active', 'inactive', 'notinterested'));
    }
}
