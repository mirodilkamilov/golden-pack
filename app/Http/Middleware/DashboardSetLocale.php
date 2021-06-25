<?php

namespace App\Http\Middleware;

use Closure;

class DashboardSetLocale
{
   public function handle($request, Closure $next)
   {
      $defaultLang = config('app.default_language');
      $locale = session('locale', $defaultLang);

      $changedLang = $request->query('change_language');
      if (isset($changedLang) && $this->isValidLangInQuery($changedLang))
         $locale = $changedLang;

      app()->setLocale($locale);
      session(['locale' => $locale]);

      return $next($request);
   }

   private function isValidLangInQuery($language): bool|int
   {
      $availableLangs = config('app.languages');
      $pattern = '/^' . implode('$|^', $availableLangs) . '$/';

      return preg_match($pattern, $language);
   }
}