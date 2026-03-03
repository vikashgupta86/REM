<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\Prop\HomeType;
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
        //
        $home_types=HomeType::all();
        view()->share('home_types',$home_types);
    }
}
