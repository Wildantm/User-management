<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SupervisorController extends Controller
{
    public function dashboard()
    {
        return view('supervisor.dashboard');
    }
    public function index()
    {
         $users = User::with(['plant', 'departement', 'jabatan'])->get();
        return view('supervisor.index', compact('users'));
    }
}
