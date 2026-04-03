<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Paginator::useTailwind();

        View::composer('*', function ($view): void {
            $settings = rescue(function () {
                if (! Schema::hasTable('settings')) {
                    return Setting::make(Setting::defaults());
                }

                return Cache::rememberForever('site_settings', function () {
                    return Setting::query()->first() ?? Setting::make(Setting::defaults());
                });
            }, Setting::make(Setting::defaults()), report: false);

            $view->with('siteSettings', $settings);
        });
    }
}
