<?php

namespace App\Providers;

use App\Models\FrontPage\FrontPage;
use Illuminate\Support\ServiceProvider;
use App\Enums\FrontPage\FrontPageStatus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $frontPage = FrontPage::with('translations')->where('is_active', FrontPageStatus::ACTIVE->value)->get();

        view()->share('navbarLinks', $frontPage);
    }
}
