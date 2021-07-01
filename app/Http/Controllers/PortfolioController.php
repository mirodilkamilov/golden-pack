<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateFormRequest;
use App\Http\Requests\UpdateTemplateFormRequest;
use App\Jobs\StoreTemplateJob;
use App\Jobs\UpdateTemplateJob;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $contents = Portfolio::all();
        return view('dashboard.template.index', compact('contents'));
    }

    public function create()
    {
        $positions = Portfolio::orderBy('position')->pluck('position')->toArray();
        return view('dashboard.template.create-edit', compact('positions'));
    }

    public function store(StoreTemplateFormRequest $request)
    {
        try {
            $portfolio = new Portfolio();
            StoreTemplateJob::dispatchSync($request, $portfolio);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('portfolios.index');
        }

        $request->session()->flash('success', 'Portfolio was successfully saved!');
        return redirect()->route('portfolios.index');
    }

    public function edit($portfolio)
    {
        $content = Portfolio::withoutEvents(function () use ($portfolio) {
            return Portfolio::findOrFail($portfolio);
        });
        $positions = Portfolio::orderBy('position')->pluck('position')->toArray();

        return view('dashboard.template.create-edit', compact('content', 'positions'));
    }

    public function update(UpdateTemplateFormRequest $request, Portfolio $portfolio)
    {
        try {
            UpdateTemplateJob::dispatchSync($request, $portfolio);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('portfolios.index');
        }

        $request->session()->flash('success', 'Portfolio was successfully updated!');
        return redirect()->route('portfolios.index');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        session()->flash('success', 'Portfolio was successfully deleted!');
        return redirect()->route('portfolios.index');
    }
}
