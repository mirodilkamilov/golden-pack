<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMainInformationRequest;
use App\Http\Requests\UpdateMainInformationRequest;
use App\Jobs\StoreMainInformationJob;
use App\Jobs\UpdateMainInformationJob;
use App\Models\CompanyDetail;

class MainInformationController extends Controller
{
    public function index()
    {
        $about = CompanyDetail::withoutEvents(function () {
            return CompanyDetail::select(['id', 'about_title', 'about_description', 'about_image'])->first();
        });
        return view('dashboard.about.main.index', compact('about'));
    }

    public function store(StoreMainInformationRequest $request)
    {
        try {
            StoreMainInformationJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('main-information.index');
        }

        $request->session()->flash('success', 'About us section was successfully saved!');
        return redirect()->route('main-information.index');
    }

    public function update(UpdateMainInformationRequest $request, $companyDetail)
    {
        $companyDetail = CompanyDetail::withoutEvents(function () use ($companyDetail) {
            return CompanyDetail::findOrFail($companyDetail);
        });

        try {
            UpdateMainInformationJob::dispatchSync($request, $companyDetail);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('main-information.index');
        }

        $request->session()->flash('success', 'About us section was successfully updated!');
        return redirect()->route('main-information.index');
    }
}