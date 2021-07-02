<?php

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainInformationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $defaultLang = config('app.default_language');
    $langInSession = session('locale');
    $locale = $langInSession ?? $defaultLang;

    return redirect()->route('home.index', $locale);
});
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => implode('|', config('app.languages'))],
    'middleware' => 'home.setLocale',
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'dashboard.setLocale'],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('users', UsersController::class)->only('update');

    Route::resource('applications', ApplicationController::class)->only('index');

    Route::resource('hero-section', HeroSectionController::class)->only('index', 'store', 'update')
        ->parameters(['hero-section' => 'companyDetail']);

    Route::resource('main-information', MainInformationController::class)->only('index', 'store', 'update')
        ->parameters(['main-information' => 'companyDetail']);

    Route::resource('contacts', ContactsController::class)->only('index', 'store', 'update')
        ->parameters(['contacts' => 'companyDetail']);

    Route::resource('processes', ProcessController::class)->except('show');

    Route::resource('equipment', EquipmentController::class)->except('show');

    Route::resource('portfolios', PortfolioController::class)->except('show');

    Route::resource('testimonials', TestimonialController::class)->except('show');

    Route::resource('advantages', AdvantageController::class)->except('show');

    Route::resource('cooperation', CooperationController::class)->except('create', 'edit', 'show', 'destroy');
});

require __DIR__ . '/auth.php';
