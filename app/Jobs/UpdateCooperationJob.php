<?php

namespace App\Jobs;

use App\Http\Requests\UpdateCooperationRequest;
use App\Models\Cooperation;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateCooperationJob
{
    use Dispatchable;

    private UpdateCooperationRequest $request;
    private Cooperation $cooperation;
    private array $validated;

    public function __construct(UpdateCooperationRequest $request, Cooperation $cooperation)
    {
        $this->request = $request;
        $this->cooperation = $cooperation;
        $this->validated = $request->validated();
        unset($this->validated['image']);
    }

    public function handle(): void
    {
        if ($this->request->hasFile('image'))
            $this->validated['image'] = $this->request->file('image')->store('cooperations');

        $this->cooperation->update($this->validated);
    }
}