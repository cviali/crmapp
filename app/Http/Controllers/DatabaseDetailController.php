<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\CustomerExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        // $this->middleware('ipcheck');
    }

    public function delete(Request $request)
    {
        // dd($request->source);
        Customer::where('source', $request->source)->update(['deleted_at' => Carbon::now()]);
        session()->flash('msg', 'Database berhasil dihapus.');
        return redirect()->route('database-list');
    }

    public function export($name)
    {
        return Excel::download(new CustomerExport($name), 'customers.xlsx');
    }

    public function index($source)
    {
        $data = Customer::where([['source', '=', $source]])->get();
        $total = $data->count();
        $customers = Customer::where('source', '=', $source)->paginate(100);
        $inprogress = $data->where('status_id', '=', 1)->count();
        $active = $data->where('status_id', '=', 2)->count();
        $inactive = $data->where('status_id', '=', 3)->count();
        $notinterested = $data->where('status_id', '=', 4)->count();
        return view('admin.databasedetail')->with(compact('customers', 'source', 'total', 'inprogress', 'active', 'inactive', 'notinterested'));
    }
}
