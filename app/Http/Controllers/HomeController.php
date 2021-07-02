<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\CompanyDetail;
use App\Models\Cooperation;
use App\Models\Equipment;
use App\Models\Portfolio;
use App\Models\Process;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $about = CompanyDetail::first();
        $processes = Process::all();
        $equipments = Equipment::all();
        $portfolios = Portfolio::all();
        $testimonials = Testimonial::all();
        $advantages = Advantage::all();
        $cooperation = Cooperation::first();

        return view('home.index', compact('about', 'processes', 'equipments', 'portfolios', 'testimonials', 'advantages', 'cooperation'));
    }
}