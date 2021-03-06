<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeroSectionRequest;
use App\Http\Requests\UpdateHeroSectionRequest;
use App\Jobs\StoreHeroSectionJob;
use App\Jobs\UpdateHeroSectionJob;
use App\Models\CompanyDetail;

class HeroSectionController extends Controller
{
    public function index()
    {
        $about = CompanyDetail::withoutEvents(function () {
            return CompanyDetail::select(['id', 'title', 'description', 'image'])->first();
        });
        return view('dashboard.about.hero.index', compact('about'));
    }

    public function store(StoreHeroSectionRequest $request)
    {
        try {
            StoreHeroSectionJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('hero-section.index');
        }

        $request->session()->flash('success', 'Successfully saved!');
        return redirect()->route('hero-section.index');
    }

    //! route model binding - resolution logic changed. Gets without events (RouteServiceProvider.php)
    public function update(UpdateHeroSectionRequest $request, CompanyDetail $companyDetail)
    {
        try {
            UpdateHeroSectionJob::dispatchSync($request, $companyDetail);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('hero-section.index');
        }

        $request->session()->flash('success', 'Successfully updated!');
        return redirect()->route('hero-section.index');
    }
}