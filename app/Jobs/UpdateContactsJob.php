<?php

namespace App\Jobs;

use App\Http\Requests\HandleContactsRequest;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateContactsJob
{
    use Dispatchable;

    private array $validated;
    private CompanyDetail $companyDetail;

    public function __construct(HandleContactsRequest $request, CompanyDetail $companyDetail)
    {
        $this->validated = $request->validated()['contacts'];
        $this->companyDetail = $companyDetail;
    }

    public function handle(): void
    {
        $this->companyDetail->update($this->validated);
    }
}