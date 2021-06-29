<?php

namespace App\Jobs;

use App\Http\Requests\UpdateMainInformationRequest;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateMainInformationJob
{
    use Dispatchable;

    private array $validated;
    private UpdateMainInformationRequest $request;
    private CompanyDetail $companyDetail;

    public function __construct(UpdateMainInformationRequest $request, CompanyDetail $companyDetail)
    {
        $this->validated = $request->validated();
        unset($this->validated['about_image']);
        $this->request = $request;
        $this->companyDetail = $companyDetail;
    }

    public function handle(): void
    {
        if ($this->request->hasFile('about_image'))
            $this->validated['about_image'] = $this->request->file('about_image')->store('about');

        $this->companyDetail->update($this->validated);
    }
}