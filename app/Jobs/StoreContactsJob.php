<?php

namespace App\Jobs;

use App\Http\Requests\HandleContactsRequest;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreContactsJob
{
    use Dispatchable;

    private array $validated;

    public function __construct(HandleContactsRequest $request)
    {
        $this->validated = $request->validated()['contacts'];
    }

    public function handle(): void
    {
        CompanyDetail::create($this->validated);
    }
}