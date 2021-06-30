<?php

namespace App\Observers;

use App\Models\Equipment;

class EquipmentObserver
{
    private string $locale;
    private string $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('locale') ?? $this->defaultLang;
    }

    public function retrieved(Equipment $process): void
    {
        if (isset($process->title)) {
            $process->title = $process->title[$this->locale] ?? $process->title[$this->defaultLang];
            $process->description = $process->description[$this->locale] ?? $process->description[$this->defaultLang];
        }
    }
}