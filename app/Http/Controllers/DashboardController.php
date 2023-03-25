<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class DashboardController extends Controller
{
    public function default()
    {
        return redirect()->route('dashboard');
    }

    public function index()
    {
        $data['users'] = User::find(1);

        return view('dashboard', $data);
    }
}
