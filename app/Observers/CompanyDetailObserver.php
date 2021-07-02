<?php

namespace App\Observers;

use App\Models\CompanyDetail;

class CompanyDetailObserver
{
    private string $locale;
    private string $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('locale') ?? $this->defaultLang;
    }

    public function retrieved(CompanyDetail $companyDetail): void
    {
        if (isset($companyDetail->title)) {
            $companyDetail->title = $companyDetail->title[$this->locale] ?? $companyDetail->title[$this->defaultLang];
            $companyDetail->description = $companyDetail->description[$this->locale] ?? $companyDetail->description[$this->defaultLang];
        }

        if (isset($companyDetail->about_title)) {
            $companyDetail->about_title = $companyDetail->about_title[$this->locale] ?? $companyDetail->about_title[$this->defaultLang];
            $companyDetail->about_description = $companyDetail->about_description[$this->locale] ?? $companyDetail->about_description[$this->defaultLang];
        }
    }
}