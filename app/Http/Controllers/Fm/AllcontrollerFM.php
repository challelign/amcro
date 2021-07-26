<?php

namespace App\Http\Controllers\Fm;

use App\Fmmastawokia;
use App\Fmmelaya;
use App\Fmmereja;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\Mastawokia;
use App\Mereja;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use Illuminate\Http\Request;

class AllcontrollerFM extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth'])->except('logout');
    }

    public function programListByDateFm($id)
    {
//       dd($id); is_artayi
        $ken = ProgramKen::find($id);


        return view('fm.programs.program-list-by-date-fm')
            ->with('ken', $ken)
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());

    }

    public function programListByDateTewatFm($id)
    {

        $ken = ProgramKen::find($id);
        return view('fm.programs.inc.all-tewat-fm')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
    }


    public function programListByDateKenFm($id)
    {

        $ken = ProgramKen::find($id);
        return view('fm.programs.inc.all-ken-fm')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
//
    }

    public function programListByDateMataFm($id)
    {

        $ken = ProgramKen::find($id);
        return view('fm.programs.inc.all-mata-fm')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
//
    }

    public function programListByDateLelitFm($id)
    {

        $ken = ProgramKen::find($id);
        return view('fm.programs.inc.all-lelit-fm')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
//
    }





    public function programListByDateTewatPrintFm($id)
    {

        $ken = ProgramKen::find($id);
        return view('fm.programs.print.p-tewat')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
    }



    public function programListByDateKenPrintFm($id)
    {
        $ken = ProgramKen::find($id);
        return view('fm.programs.print.p-ken')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
    }

    public function programListByDateMataPrintFm($id)
    {
        $ken = ProgramKen::find($id);
        return view('fm.programs.print.p-mata')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
    }

    public function programListByDateLelitPrintFm($id)
    {
        $ken = ProgramKen::find($id);
        return view('fm.programs.print.p-lelit')
            ->with('ken', $ken)
            ->with('mastawokiafm', Fmmastawokia::all()->where('program_ken_id', $id))
            ->with('merejafm', Fmmereja::all())
            ->with('programfm', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());
    }

}
