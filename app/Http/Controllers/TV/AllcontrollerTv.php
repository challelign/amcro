<?php

namespace App\Http\Controllers\Tv;

use App\Fmmelaya;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\ProgramKen;
use App\Tvmastawokia;
use App\Tvmitelalefbet;
use App\Tvprogram;
use Illuminate\Http\Request;

class AllcontrollerTv extends Controller
{


    public function programListByDateTv($id)
    {
//       dd($id); is_artayi
        $ken = ProgramKen::find($id);


        return view('tv.programs.program-list-by-date-tv')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//            ->with('programmeleyaid', Fmmelaya::all());

    }
    public function programListByDateTewatTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-tewat-tv')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());

//            ->with('programmeleyaid', Fmmelaya::all());
    }



    public function programListByDateKenTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-ken-tv')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//
    }

    public function programListByDateMataTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-mata-tv')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//
    }

    public function programListByDateLelitTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-lelit-tv')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//
    }





    public function programListByDateTewatPrintTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-tewat')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }



    public function programListByDateKenPrintTv($id)
    {
        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-ken')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }

    public function programListByDateMataPrintTv($id)
    {
        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-mata')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }

    public function programListByDateLelitPrintTv($id)
    {
        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-lelit')
            ->with('ken', $ken)
            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }
    public function programListTv()
    {
        $program = Tvprogram::all();
        $ken = ProgramKen::all();
        $programmeleyaid = Fmmelaya::all();
        $prodate = $program->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $program->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('tv.programs.program-list-tv', compact('program', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
//        return view('programs.program-list')


//            ->with('program', Program::all()->sortByDesc('id'))
//            ->with('ken', ProgramKen::all())
//            ->with('programmeleyaid', ProgramMeleya::all());
    }
}
