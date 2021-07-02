<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeComposer
{
    public string $titleOfPage;
    public string $locale;

    public function __construct(Request $request)
    {
        $titleOfPage = $request->segment(2) ?? 'Golden Pack';
        $this->titleOfPage = Str::title($titleOfPage);

        $this->locale = session('locale') ?? config('app.default_language');
    }

    public function compose(View $view): void
    {
        $view->with('titleOfPage', $this->titleOfPage);
        $view->with('locale', $this->locale);
    }
}
