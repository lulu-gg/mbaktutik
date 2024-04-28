<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('format_currency', function ($expression) {
            if ($expression == null) return '-';
            return "Rp. <?= number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('format_number', function ($expression) {
            return "<?= number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('format_date', function ($date) {
            return "<?= isset($date) ? (($date)->format('M d Y,  h:i a')) : '-' ?>";
        });
    }
}
