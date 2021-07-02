<?php

namespace App\Jobs;

use App\Http\Requests\StoreCooperationRequest;
use App\Models\Cooperation;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreCooperationJob
{
    use Dispatchable;

    private StoreCooperationRequest $request;
    private array $validated;

    public function __construct(StoreCooperationRequest $request)
    {
        $this->request = $request;
        $this->validated = $request->validated();
        unset($this->validated['image']);
    }

    public function handle(): void
    {
        if ($this->request->hasFile('image'))
            $this->validated['image'] = $this->request->file('image')->store('cooperations');

        Cooperation::create($this->validated);
    }
}