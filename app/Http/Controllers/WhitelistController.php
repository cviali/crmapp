<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhitelistController extends Controller
{
    public function add(Request $request)
    {
        DB::table('whitelist')->insert([
            'ip' => $request->ip,
        ]);

        return redirect()->route('whitelist');
    }

    public function delete($ip)
    {
        DB::table('whitelist')->where('ip', $ip)->delete();

        return redirect()->route('whitelist');
    }

    public function index()
    {
        $whitelist = DB::table('whitelist')->get();
        return view('admin.whitelist', with(compact(('whitelist'))));
    }
}
