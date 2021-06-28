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
        $about = CompanyDetail::first();
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

        $request->session()->flash('success', 'Hero section was successfully saved!');
        return redirect()->route('hero-section.index');
    }

    public function update(UpdateHeroSectionRequest $request, CompanyDetail $companyDetail)
    {
        try {
            UpdateHeroSectionJob::dispatchSync($request, $companyDetail);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('hero-section.index');
        }

        $request->session()->flash('success', 'Hero section was successfully updated!');
        return redirect()->route('hero-section.index');
    }
}