<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateFormRequest;
use App\Http\Requests\UpdateTemplateFormRequest;
use App\Jobs\StoreTemplateJob;
use App\Jobs\UpdateTemplateJob;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index()
    {
        $contents = Equipment::all();
        return view('dashboard.template.index', compact('contents'));
    }

    public function create()
    {
        $positions = Equipment::orderBy('position')->pluck('position')->toArray();
        return view('dashboard.template.create-edit', compact('positions'));
    }

    public function store(StoreTemplateFormRequest $request)
    {
        try {
            $equipment = new Equipment();
            StoreTemplateJob::dispatchSync($request, $equipment);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('equipment.index');
        }

        $request->session()->flash('success', 'Successfully saved!');
        return redirect()->route('equipment.index');
    }

    public function edit($equipment)
    {
        $content = Equipment::withoutEvents(function () use ($equipment) {
            return Equipment::findOrFail($equipment);
        });
        $positions = Equipment::orderBy('position')->pluck('position')->toArray();

        return view('dashboard.template.create-edit', compact('content', 'positions'));
    }

    public function update(UpdateTemplateFormRequest $request, Equipment $equipment)
    {
        try {
            UpdateTemplateJob::dispatchSync($request, $equipment);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('equipment.index');
        }

        $request->session()->flash('success', 'Successfully updated!');
        return redirect()->route('equipment.index');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        session()->flash('success', 'Successfully deleted!');
        return redirect()->route('equipment.index');
    }
}
