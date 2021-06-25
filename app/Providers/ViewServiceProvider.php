<?php

namespace App\Providers;

use App\Http\ViewComposers\DashboardComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    */
   public function register(): void
   {
      //
   }

   /**
    * Bootstrap services.
    */
   public function boot(): void
   {
      //        View::composer(['home.index', 'about.index', 'contacts.create', 'projects.*', 'components.*'], HomeComposer::class);
      View::composer(['dashboard.*'], DashboardComposer::class);
   }
}