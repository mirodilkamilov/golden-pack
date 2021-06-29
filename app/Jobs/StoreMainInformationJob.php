<?php

namespace App\Jobs;

use App\Http\Requests\StoreMainInformationRequest;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreMainInformationJob
{
    use Dispatchable;

    private array $validated;
    private StoreMainInformationRequest $request;

    public function __construct(StoreMainInformationRequest $request)
    {
        $this->validated = $request->validated();
        unset($this->validated['about_image']);
        $this->request = $request;
    }

    public function handle(): void
    {
        if ($this->request->hasFile('about_image'))
            $this->validated['about_image'] = $this->request->file('about_image')->store('about');

        CompanyDetail::create($this->validated);
    }
}