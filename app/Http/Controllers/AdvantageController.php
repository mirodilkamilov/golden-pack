<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateFormRequest;
use App\Http\Requests\UpdateTemplateFormRequest;
use App\Jobs\StoreTemplateJob;
use App\Jobs\UpdateTemplateJob;
use App\Models\Advantage;

class AdvantageController extends Controller
{
    public function index()
    {
        $contents = Advantage::all();
        return view('dashboard.template.index', compact('contents'));
    }

    public function create()
    {
        $positions = Advantage::orderBy('position')->pluck('position')->toArray();
        return view('dashboard.template.create-edit', compact('positions'));
    }

    public function store(StoreTemplateFormRequest $request)
    {
        try {
            $advantage = new Advantage();
            StoreTemplateJob::dispatchSync($request, $advantage);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('advantages.index');
        }

        $request->session()->flash('success', 'Advantage was successfully saved!');
        return redirect()->route('advantages.index');
    }

    public function edit($advantage)
    {
        $content = Advantage::withoutEvents(function () use ($advantage) {
            return Advantage::findOrFail($advantage);
        });
        $positions = Advantage::orderBy('position')->pluck('position')->toArray();

        return view('dashboard.template.create-edit', compact('content', 'positions'));
    }

    public function update(UpdateTemplateFormRequest $request, Advantage $advantage)
    {
        try {
            UpdateTemplateJob::dispatchSync($request, $advantage);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('advantages.index');
        }

        $request->session()->flash('success', 'Advantage was successfully updated!');
        return redirect()->route('advantages.index');
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();

        session()->flash('success', 'Advantage was successfully deleted!');
        return redirect()->route('advantages.index');
    }
}
