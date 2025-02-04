<?php

use App\Http\Controllers\API\Dashboard\ContactUs\ContactUsController;
use App\Http\Controllers\FrontPages\ContactPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages\DynamicPageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['web'])->group(function () {
    Route::get('{slug?}', [DynamicPageController::class, 'index'])
        ->where('slug', '^(?!ar|fr|es)[^/]*$') // Single segment, not 'ar', 'fr', 'es'
        ->name('dynamic.page');

    Route::get('{slug}/{single_slug}', [DynamicPageController::class, 'show'])
        ->where('slug', '^(?!ar|fr|es).*$') // Exclude 'ar', 'fr', 'es'
        ->name('dynamic.page.show');
});
Route::prefix('{lang?}')->where(['lang' => 'ar|fr|es']) // Supported languages except 'en'
->middleware(['web'])->group(function () {
       Route::get('{slug?}', [DynamicPageController::class, 'index'])
            ->where('slug', '[^/]*') // Single segment after language prefix
            ->name('dynamic.page');
        // Match '/ar/slug/single-slug'
        Route::get('{slug}/{single_slug}', [DynamicPageController::class, 'show'])
            ->name('dynamic.page.show');
    });
  Route::post('contact-us/store',[ContactPageController::class ,'store'])->name('contact-us.store');
