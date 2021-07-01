<?php

namespace App\Observers;

use App\Models\Testimonial;

class TestimonialObserver
{
    private string $locale;
    private string $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('locale') ?? $this->defaultLang;
    }

    public function retrieved(Testimonial $testimonial): void
    {
        if (isset($testimonial->title)) {
            $testimonial->title = $testimonial->title[$this->locale] ?? $testimonial->title[$this->defaultLang];
            $testimonial->description = $testimonial->description[$this->locale] ?? $testimonial->description[$this->defaultLang];
        }
    }
}