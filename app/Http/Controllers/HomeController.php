<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Mail\ErrorReportMail;
use App\Models\Advantage;
use App\Models\Application;
use App\Models\CompanyDetail;
use App\Models\Cooperation;
use App\Models\Equipment;
use App\Models\Portfolio;
use App\Models\Process;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class HomeController
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

    public function store(StoreApplicationRequest $request)
    {
        $locale = session('locale') ?? config('app.default_language');
        $validated = $request->validated();

        try {
            Application::create($validated);
        } catch (\Exception $exception) {
            $request->session()->flash('error', 'Something went wrong. Admin was notified');
            Mail::to(User::first()->email)->send(new ErrorReportMail($validated, $exception));
            return redirect()->route('index', $locale);
        }

        $request->session()->flash('success', 'The application has been sent successfully!');
        return redirect()->route('index', $locale);
    }
}