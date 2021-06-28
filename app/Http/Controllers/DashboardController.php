<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.index', compact('user'));
    }
}