<?php

namespace App\Observers;

use App\Models\Cooperation;

class CooperationObserver
{
    private string $locale;
    private string $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('locale') ?? $this->defaultLang;
    }

    public function retrieved(Cooperation $cooperation): void
    {
        $lists = collect();
        if (isset($cooperation->list)) {
            foreach ($cooperation->list as $list) {
                $lists->push($list[$this->locale] ?? $list[$this->defaultLang]);
            }
            $cooperation->list = $lists;
        }
    }
}