<?php

namespace App\Observers;

use App\Models\Advantage;

class AdvantageObserver
{
    private string $locale;
    private string $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('locale') ?? $this->defaultLang;
    }

    public function retrieved(Advantage $advantage): void
    {
        if (isset($advantage->title)) {
            $advantage->title = $advantage->title[$this->locale] ?? $advantage->title[$this->defaultLang];
            $advantage->description = $advantage->description[$this->locale] ?? $advantage->description[$this->defaultLang];
        }
    }
}