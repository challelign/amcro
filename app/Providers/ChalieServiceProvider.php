<?php

namespace App\Providers;

use App\Feedback;
use App\Fmmastawokia;
use App\Fmmelaya;
use App\Fmmereja;
use App\Fmprogram;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use App\Tvmastawokia;
use App\Tvmitelalefbet;
use App\Tvprogram;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ChalieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.app',
//            'fm.programs.program-list-by-date-fm',
            'feedback.feedback',

            'programs.program.list-by-date',
//            new start
//            'tv.programs.program-list-by-date-tv',
//            new end
            'programs.program.list-by-date-edit',
            'programs.program-ayidi-create',

            'fm.programs.program-ayidi-create-fm',

//            'fm.programs.inc.all-tewat-fm',

            'programs.merehagibr-create',
//            'Auth.register',
            'auth.register',

            'auth.fm.register-fm',
            'auth.pro.register-pro',
            'auth.admin.register-admin',
            'auth.tv.register-tv',
            'auth.register-edit',
            'feedback.feedback',
            'auth.supervisor.register-supervisor'
//            'fm.programs.program-list-by-date-fm',


//            'Auth.user-edit',
//            'programs.program-list',
//            'programs.program-home',
//            'programs.program-create',
//            'programs.program-index',
//            'programs.program-view',


        ], function ($view) {
            $view->with('ken', ProgramKen::all())
                ->with('program', Program::all())
                ->with('meleyafm', Fmmelaya::all())
                ->with('programfm', Fmprogram::all())
                ->with('programtv', Tvprogram::all())
                ->with('mastawokiafm', Fmmastawokia::all())
                ->with('mastawokiatv', Tvmastawokia::all())
                ->with('merejafm', Fmmereja::all())
                ->with('mitelalfbettv', Tvmitelalefbet::all())
                ->with('feedback', Feedback::all())
                ->with('users', User::all())
                ->with('programmeleyaid', ProgramMeleya::all());
        });
    }
}
