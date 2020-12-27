<?php

namespace App\Providers;
use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
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
        Inertia::share("flash", function () {
            return [
                "success" => Session::get("success"),
                "error" => Session::get("success"),
                //  "user"=> Auth::with('roles')->get(),
            ];
        });
    }
}
