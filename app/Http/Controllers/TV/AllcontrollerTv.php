<?php

namespace App\Http\Controllers\TV;

use App\Fmmastawokia;
use App\Fmmelaya;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\ProgramKen;
use App\Tvmastawokia;
use App\Tvmitelalefbet;
use App\Tvprogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllcontrollerTv extends Controller
{


    public function programListByDateTv($id)
    {
//       dd($id); is_artayi
        $ken = ProgramKen::find($id);


        return view('tv.programs.program-list-by-date-tv')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//            ->with('programmeleyaid', Fmmelaya::all());

    }

    public function updatePositionTv(Request $request)
    {
//        dd($request->all());
        if (Auth::user()->role_id == 9 || Auth::user()->role_id == 10) {
            $mastawokiatv = Tvmastawokia::all();
            foreach ($mastawokiatv as $mast) {
                $mast->timestamps = false; // To disable update_at field updation
                $id = $mast->id;
                foreach ($request->order as $order) {
                    if ($order['id'] == $id) {
                        $mast->update(['position' => $order['position']]);
                    }
                }
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'የማስታወቂያ ቅደም ተከተለል አስተካክለሀል'
                ]
            );

//            return response('Update Successfully.', 200);
        } else {
            session()->flash('error', "የማስታወቂያ ቅደም ተከተለል ማስተካከል አትችልም ፡፡  ");
            return redirect()->back();
        }

    }

    public function programListByDateTewatTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-tewat-tv')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());

//            ->with('programmeleyaid', Fmmelaya::all());
    }



    public function programListByDateKenTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-ken-tv')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//
    }

    public function programListByDateMataTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-mata-tv')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//
    }

    public function programListByDateLelitTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.inc.all-lelit-tv')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
//
    }





    public function programListByDateTewatPrintTv($id)
    {

        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-tewat')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }



    public function programListByDateKenPrintTv($id)
    {
        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-ken')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }

    public function programListByDateMataPrintTv($id)
    {
        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-mata')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }

    public function programListByDateLelitPrintTv($id)
    {
        $ken = ProgramKen::find($id);
        return view('tv.programs.print.p-lelit')
            ->with('ken', $ken)
//            ->with('mastawokiatv',Tvmastawokia::all())
            // ->with('mastawokiatv', Tvmastawokia::orderBy('position', 'ASC')->where('program_ken_id', $id)->get())
            ->with('mastawokiatv', Tvmastawokia::orderBy('position')->where('program_ken_id', $id)->get())
            ->with('programtv', Tvprogram::all()->where('program_ken_id', $id))
            ->with('mitelalfbettv',Tvmitelalefbet::all());
    }
    public function programListTv()
    {
        // $program = Tvprogram::all();
        // $ken = ProgramKen::all();
        // $programmeleyaid = Fmmelaya::all();
        // $prodate = $program->sortByDesc('today_date')->pluck('today_date')->unique();
        // $proelet = $program->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
        // $proken = $ken->sortBy('id')->pluck('name')->unique();

        // return view('tv.programs.program-list-tv', compact('program', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));




        $program = Tvprogram::orderBy('created_at', 'desc')->where('is_transmit', 1)
        ->where('is_artayi_check', 1)
        ->orderBy('created_at', 'desc')->paginate(5);
         $ken = ProgramKen::all();
         $programmeleyaid = Fmmelaya::all();
         $prodate = Tvprogram::all()->sortByDesc('created_at')->pluck('today_date')->unique();
         $proelet = Tvprogram::all()->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
         $proken = $ken->sortBy('id')->pluck('name')->unique();

         return view('tv.programs.program-list-tv', compact('program', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));

    }
}
