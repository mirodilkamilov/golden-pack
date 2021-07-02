<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCooperationRequest;
use App\Http\Requests\UpdateCooperationRequest;
use App\Jobs\StoreCooperationJob;
use App\Jobs\UpdateCooperationJob;
use App\Models\Cooperation;

class CooperationController extends Controller
{
    public function index()
    {
        $content = Cooperation::withoutEvents(function () {
            return Cooperation::first();
        });
        return view('dashboard.cooperations.index', compact('content'));
    }

    public function store(StoreCooperationRequest $request)
    {
        try {
            StoreCooperationJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('cooperation.index');
        }

        $request->session()->flash('success', 'Cooperation was successfully saved!');
        return redirect()->route('cooperation.index');
    }

    public function update(UpdateCooperationRequest $request, Cooperation $cooperation)
    {
        try {
            UpdateCooperationJob::dispatchSync($request, $cooperation);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('cooperation.index');
        }

        $request->session()->flash('success', 'Cooperation was successfully saved!');
        return redirect()->route('cooperation.index');
    }
}
