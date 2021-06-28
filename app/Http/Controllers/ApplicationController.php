<?php

namespace App\Http\Controllers;

use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::paginate(15);
        return view('dashboard.applications.index', compact('applications'));
    }
}
