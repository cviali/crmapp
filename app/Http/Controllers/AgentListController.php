<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        // $this->middleware('ipcheck');
    }

    public function index()
    {
        $agents = User::whereHas('roles', function ($query) {
            $user = Auth::user();
            $query->where([['name', '=', 'agent'], ['admin_id', '=', $user->id], ['deleted_at', '=', null]]);
        })->get();
        return view('admin.agentlist')->with(compact('agents'));
    }
}
