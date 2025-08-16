<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $adminKey = request('key') ? '?key=' . request('key') : '';
        View::share('adminKey', $adminKey);
        app()->singleton('adminKey', fn () => $adminKey);

        Gate::define('admin', function ($user = null) {
            return request('key') === config('admin.key');
        });
    }
}
