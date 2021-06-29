<?php

namespace App\Jobs;

use App\Http\Requests\StoreHeroSectionRequest;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreHeroSectionJob
{
    use Dispatchable;

    private array $validated;
    private StoreHeroSectionRequest $request;

    public function __construct(StoreHeroSectionRequest $request)
    {
        $this->validated = $request->validated();
        unset($this->validated['image']);
        $this->request = $request;
    }

    public function handle(): void
    {
        if ($this->request->hasFile('image'))
            $this->validated['image'] = $this->request->file('image')->store('hero-section');

        CompanyDetail::create($this->validated);
    }
}