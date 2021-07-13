<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateFormRequest;
use App\Http\Requests\UpdateTemplateFormRequest;
use App\Jobs\StoreTemplateJob;
use App\Jobs\UpdateTemplateJob;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $contents = Testimonial::all();
        return view('dashboard.template.index', compact('contents'));
    }

    public function create()
    {
        $positions = Testimonial::orderBy('position')->pluck('position')->toArray();
        return view('dashboard.template.create-edit', compact('positions'));
    }

    public function store(StoreTemplateFormRequest $request)
    {
        try {
            $testimonial = new Testimonial();
            StoreTemplateJob::dispatchSync($request, $testimonial);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('testimonials.index');
        }

        $request->session()->flash('success', 'Successfully saved!');
        return redirect()->route('testimonials.index');
    }

    public function edit($testimonial)
    {
        $content = Testimonial::withoutEvents(function () use ($testimonial) {
            return Testimonial::findOrFail($testimonial);
        });
        $positions = Testimonial::orderBy('position')->pluck('position')->toArray();

        return view('dashboard.template.create-edit', compact('content', 'positions'));
    }

    public function update(UpdateTemplateFormRequest $request, Testimonial $testimonial)
    {
        try {
            UpdateTemplateJob::dispatchSync($request, $testimonial);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('testimonials.index');
        }

        $request->session()->flash('success', 'Successfully updated!');
        return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        session()->flash('success', 'Successfully deleted!');
        return redirect()->route('testimonials.index');
    }
}
