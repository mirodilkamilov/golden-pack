<?php

namespace App\Jobs;

use App\Http\Requests\StoreTemplateFormRequest;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Stores new records in all similar tables
 *
 * $request, $model
 */
class StoreTemplateJob
{
    use Dispatchable;

    private StoreTemplateFormRequest $request;
    private array $validated;
    private string $directoryNameToStoreImage;
    private $model;


    public function __construct(StoreTemplateFormRequest $request, $model)
    {
        $this->validated = $request->validated();
        unset($this->validated['image']);

        $this->request = $request;
        $this->directoryNameToStoreImage = $request->segment(2) ?? 'other';
        $this->model = $model;
    }

    public function handle(): void
    {
        if ($this->request->hasFile('image'))
            $this->validated['image'] = $this->request->file('image')->store($this->directoryNameToStoreImage);

        $this->model->fill($this->validated);
        $this->model->save();
    }
}