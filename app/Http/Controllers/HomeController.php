<?php

namespace App\Http\Controllers;
use App\Feedback;
use App\Fmmerehagibr;
use App\Merehagibr;
use App\Miraf;
use App\Tvpcontent;
use Illuminate\Support\Facades\Auth;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home')->with('program', Program::all())
            ->with('ken', ProgramKen::all())
            ->with('merehagibr', Merehagibr::all())
            ->with('miraf', Miraf::all())
            ->with('ken', ProgramKen::all())
            ->with('pcontent', Tvpcontent::all())
            ->with('fmm', Fmmerehagibr::all())
            ->with('feedback',Feedback::all())
            ->with('programmeleyaid', ProgramMeleya::all());
    }
}
