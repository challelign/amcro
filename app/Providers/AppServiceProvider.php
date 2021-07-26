<?php

namespace App\Providers;
use App\Program;
use App\User;
use App\ProgramMeleya;

use App\ProgramKen;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
//        View::share('ken',ProgramKen::orderBy('id','ASC')->get());

        // View::composer(['layouts.*',
            // 'programs.*',
       


        // ], function ($view) {
            // $view->with('program', Program::all())
                // ->with('users', User::all())
                // ->with('ken', ProgramKen::all())
                // ->with('programmeleyaid', ProgramMeleya::all());
        // });
    }
}
