<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleContactsRequest;
use App\Jobs\StoreContactsJob;
use App\Jobs\UpdateContactsJob;
use App\Models\CompanyDetail;

class ContactsController extends Controller
{
    public function index()
    {
        $about = CompanyDetail::withoutEvents(function () {
            return CompanyDetail::select(['id', 'address', 'phone', 'email', 'google_map', 'social_media'])->first();
        });
        return view('dashboard.about.contacts.index', compact('about'));
    }

    public function store(HandleContactsRequest $request)
    {
        try {
            StoreContactsJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('contacts.index');
        }

        $request->session()->flash('success', 'Contacts was successfully saved!');
        return redirect()->route('contacts.index');
    }

    //! route model binding - resolution logic changed. Gets without events (RouteServiceProvider.php)
    public function update(HandleContactsRequest $request, CompanyDetail $companyDetail)
    {
//        dd($request->validated());
        try {
            UpdateContactsJob::dispatchSync($request, $companyDetail);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('contacts.index');
        }

        $request->session()->flash('success', 'Contacts was successfully updated!');
        return redirect()->route('contacts.index');
    }
}