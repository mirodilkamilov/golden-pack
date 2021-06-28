<?php

namespace App\Jobs;

use App\Http\Requests\UpdateHeroSectionRequest;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateHeroSectionJob
{
    use Dispatchable;

    private array $validated;
    private UpdateHeroSectionRequest $request;
    private CompanyDetail $companyDetail;

    public function __construct(UpdateHeroSectionRequest $request, CompanyDetail $companyDetail)
    {
        $this->validated = $request->validated();
        unset($this->validated['image']);
        $this->request = $request;
        $this->companyDetail = $companyDetail;
    }

    public function handle()
    {
        if ($this->request->hasFile('image'))
            $this->validated['image'] = $this->request->file('image')->store('hero-section');

        $this->companyDetail->update($this->validated);
    }
}