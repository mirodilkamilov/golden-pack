<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateFormRequest;
use App\Http\Requests\UpdateTemplateFormRequest;
use App\Jobs\StoreTemplateJob;
use App\Jobs\UpdateTemplateJob;
use App\Models\Process;

class ProcessController extends Controller
{
    public function index()
    {
        $processes = Process::all();
        return view('dashboard.processes.index', compact('processes'));
    }

    public function create()
    {
        $positions = Process::orderBy('position')->pluck('position')->toArray();
        return view('dashboard.processes.create-edit', compact('positions'));
    }

    public function store(StoreTemplateFormRequest $request)
    {
        try {
            $process = new Process;
            StoreTemplateJob::dispatchSync($request, $process, 'process');
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('processes.index');
        }

        $request->session()->flash('success', 'Process was successfully saved!');
        return redirect()->route('processes.index');
    }

    public function edit($process)
    {
        $process = Process::withoutEvents(function () use ($process) {
            return Process::findOrFail($process);
        });
        $positions = Process::orderBy('position')->pluck('position')->toArray();

        return view('dashboard.processes.create-edit', compact('process', 'positions'));
    }

    public function update(UpdateTemplateFormRequest $request, Process $process)
    {
        try {
            UpdateTemplateJob::dispatchSync($request, $process, 'process');
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('processes.index');
        }

        $request->session()->flash('success', 'Process was successfully updated!');
        return redirect()->route('processes.index');
    }

    public function destroy(Process $process)
    {
        //
    }
}