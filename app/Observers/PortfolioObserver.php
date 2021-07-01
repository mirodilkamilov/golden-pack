<?php

namespace App\Observers;

use App\Models\Portfolio;

class PortfolioObserver
{
    private string $locale;
    private string $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('locale') ?? $this->defaultLang;
    }

    public function retrieved(Portfolio $portfolio): void
    {
        if (isset($portfolio->title)) {
            $portfolio->title = $portfolio->title[$this->locale] ?? $portfolio->title[$this->defaultLang];
            $portfolio->description = $portfolio->description[$this->locale] ?? $portfolio->description[$this->defaultLang];
        }
    }
}