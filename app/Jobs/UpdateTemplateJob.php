<?php

namespace App\Jobs;

use App\Http\Requests\UpdateTemplateFormRequest;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Updates the record in all similar tables
 *
 * $request, $model
 */
class UpdateTemplateJob
{
    use Dispatchable;

    private UpdateTemplateFormRequest $request;
    private array $validated;
    private string $directoryNameToStoreImage;
    private $model;

    public function __construct(UpdateTemplateFormRequest $request, $model)
    {
        $this->validated = $request->validated();
        unset($this->validated['image'], $this->validated['ignored_position']);

        $this->request = $request;
        $this->directoryNameToStoreImage = $request->segment(2) ?? 'other';
        $this->model = $model;
    }

    public function handle(): void
    {
        if ($this->request->hasFile('image'))
            $this->validated['image'] = $this->request->file('image')->store($this->directoryNameToStoreImage);

        $this->model->update($this->validated);
    }
}