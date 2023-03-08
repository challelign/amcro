<?php

namespace App\Http\Controllers\Pro;

use App\Http\Controllers\Controller;
use App\ProgramKen;
use App\Tvmastawokia;
use App\Tvmitelalefbet;
use App\Tvprogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MastawokiaControllerTv extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth'])->except('logout');
    }

    public function mastawokiaCreateTv()
    {
        if (auth()->user()->role_id == '2' || auth()->user()->role_id == '1' || auth()->user()->role_id == '8') {
            session()->flash('error', "You are not Allowed to Access this page ፡፡  ");
            return redirect()->back();
        }
        return view('tv.mastawokia.mastawokia-create-tv')
            ->with('program', Tvprogram::all())
            ->with('ken', ProgramKen::all());
//            ->with('programmeleyaid', Fmmelaya::all());
    }

    public function mastawokiaSaveTv(Request $request)
    {

//dd($request->ajax());
        if ($request->ajax()) {
            $rules = array(
                'program_ken_id' => 'required',
                'mastawokia_mitelalefbet' => 'required',
                'today_date' => 'required',
                'mastawokia_tekuam.*' => 'required',
                'mastawokia_file.*' => 'required',
                'mastawokia_gize.*' => 'required',
                'mastawokia_mitelalefbet_seat.*' => 'required',
                'mastawokia_diggmosh.*' => 'required',
                'mastawokia_video_id.*' => 'required',
//                'mastawokia_text.*' => 'required',
//                'mastawokia_Yetestenagedew_meten.*' => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            } else {
                $program_ken_id = $request->program_ken_id;
                $mastawokia_mitelalefbet = $request->mastawokia_mitelalefbet;
                $today_date = $request->today_date;
                $mastawokia_tekuam = $request->mastawokia_tekuam;
                $mastawokia_file = $request->mastawokia_file;
                $mastawokia_gize = $request->mastawokia_gize;
                $mastawokia_mitelalefbet_seat = $request->mastawokia_mitelalefbet_seat;
                $mastawokia_diggmosh = $request->mastawokia_diggmosh;
                $mastawokia_video_id = $request->mastawokia_video_id;
//                $mastawokia_text = $request->mastawokia_text;
//                $mastawokia_Yetestenagedew_meten = $request->mastawokia_Yetestenagedew_meten;

                for ($count = 0; $count < count($mastawokia_diggmosh); $count++) {
                    $data = array(
                        'user_id' => auth()->user()->id,
                        'program_ken_id' => $program_ken_id,
//                        'mastawokia_text' => $mastawokia_text,
                        'mastawokia_mitelalefbet' => $mastawokia_mitelalefbet,
                        'today_date' => $today_date,
                        'mastawokia_tekuam' => $mastawokia_tekuam[$count],
                        'mastawokia_file' => $mastawokia_file[$count],

                        'mastawokia_mitelalefbet_seat' => $mastawokia_mitelalefbet_seat[$count],
                        'mastawokia_gize' => $mastawokia_gize[$count],
                        'mastawokia_diggmosh' => $mastawokia_diggmosh[$count],
                        'mastawokia_video_id' => $mastawokia_video_id[$count],
//                        'mastawokia_Yetestenagedew_meten' => $mastawokia_Yetestenagedew_meten[$count],
                        'created_at' => \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now()  # \Datetime()
                    );
                    $insert_data[] = $data;
                }
                Tvmastawokia::insert($insert_data);
                return response()->json([
                    'success' => 'የዛሬ ቀን ማስታወቂያ መዝግበሃል  ፡ ማስተካክለ ከፈለግህ በመዘገብኸው ቀን መርጠህ ኤዲት አርግ .'
                ]);

            }
        } else {
            return response()->json([
                'error' => 'Data Insertion Error .'
            ]);
        }
    }


    public function mastawokiaEditTv($id)
    {
//       dd($id);
        $mastawokiatv = Tvmastawokia::find($id);
        if ((auth()->user()->role_id == '2' || auth()->user()->role_id == '9') && $mastawokiatv->is_artayi_check == '1') {
            session()->flash('error', "ማስታወቂያ ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('tv.mastawokia.mastawokia-edit-tv')
            ->with('ken', ProgramKen::all())
            ->with('mastawokia', $mastawokiatv)
            ->with('program', Tvprogram::all()->where('program_ken_id', $id));

    }

    public function mastawokiaUpdateTv(Request $request, int $id)
    {
//        dd($request->all());
        $mastawokiatv = Tvmastawokia::findorfail($id);
        $this->validate($request, [
            'program_ken_id' => 'required',
            'mastawokia_mitelalefbet' => 'required',
            'today_date' => 'required',
            'mastawokia_tekuam.*' => 'required',
            'mastawokia_video_id.*' => 'required',
            'mastawokia_file.*' => 'required',
            'mastawokia_gize.*' => 'required',
            'mastawokia_mitelalefbet_seat.*' => 'required',
            'mastawokia_diggmosh.*' => 'required',
//            'mastawokia_text.*' => 'required',
//            'mastawokia_Yetestenagedew_meten.*' => 'required',
        ]);

        $mastawokiatv->program_ken_id = $request->program_ken_id;
        $mastawokiatv->updated_by = auth()->user()->name;
        $mastawokiatv->mastawokia_mitelalefbet = $request->mastawokia_mitelalefbet;
        $mastawokiatv->today_date = $request->today_date;
        $mastawokiatv->mastawokia_file = $request->mastawokia_file;
        $mastawokiatv->mastawokia_video_id = $request->mastawokia_video_id;
        $mastawokiatv->mastawokia_tekuam = $request->mastawokia_tekuam;
        $mastawokiatv->mastawokia_gize = $request->mastawokia_gize;
        $mastawokiatv->mastawokia_mitelalefbet_seat = $request->mastawokia_mitelalefbet_seat;
        $mastawokiatv->mastawokia_diggmosh = $request->mastawokia_diggmosh;
        $mastawokiatv->mastawokia_text = $request->mastawokia_text;
//        $mastawokia->mastawokia_Yetestenagedew_meten = $request->mastawokia_Yetestenagedew_meten;

        $mastawokiatv->save();
        session()->flash('success', "የቴሌቪዥን ማስታወቂያ  አስተካክለህ  መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date-tv', $mastawokiatv->program_ken_id));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function mastawokiaDeleteTv($id)
    {
//        dd($id);
        $mastawokiatv = Tvmastawokia::find($id);
        if ((auth()->user()->role_id == '9') && $mastawokiatv->is_artayi_check == '1') {
//        if (auth()->user()->is_artayi == '0' && $mastawokia->is_artayi_check == '1') {
            session()->flash('error', "ማስታወቂያ መሰረዝ አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        $mastawokiatv->delete();
        session()->flash('success', " ማስታወቂያ  ሰርዘሀል / You have delete a mastawokia successfully  ፡፡  ");
//        return redirect(route('program-list-by-date', $mastawokia->program_ken_id));
        return redirect()->back();
    }

    public function mastawokiaApproveTechTv($id)
    {
        $mastawokia = Tvmastawokia::find($id);
        $mastawokia->is_transmit = '1';
        $mastawokia->not_transmit = '0';

        $mastawokia->technician = auth()->user()->name;
        $mastawokia->save();
        session()->flash('success', "ማስታወቂያው  መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function mastawokiaApproveTechNotTv($id)
    {
        $mastawokia = Tvmastawokia::find($id);
        $mastawokia->is_transmit = '1';
        $mastawokia->not_transmit = '1';
        $mastawokia->technician_not = auth()->user()->name;
        $mastawokia->save();
        session()->flash('success', "ማስታወቂያው  አልተላለፈም ፡፡  ");
        return redirect()->back();

    }


    public function mastawokiaApproveArtayiTv($id)
    {
        $mastawokia = Tvmastawokia::find($id);

        $mastawokia->is_artayi_check = '1';
        $mastawokia->artayi = auth()->user()->name;
        $mastawokia->save();


        session()->flash('success', "ማስታወቂያው እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }
    public function mastawokiaApprovesupervisorTv($id)
    {
        $mastawokia = Tvmastawokia::find($id);

        $mastawokia->is_supervisor = '1';
        $mastawokia->supervisor = auth()->user()->name;
        $mastawokia->save();


        session()->flash('success', "ማስታወቂያው እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function mastawokiaListTv()
    {
        $program = Tvprogram::all();
        $ken = ProgramKen::all();
        $programmeleyaid = Tvmitelalefbet::all();
        $mastawokiatv = Tvmastawokia::
        orderBy('created_at', 'desc')
        ->where('is_transmit', 1)
        ->where('not_transmit', 0)
        ->where('is_artayi_check', 1)
        ->orderBy('created_at', 'desc')->paginate(10);

        $prodate = $mastawokiatv->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mastawokiatv->sortBy('mastawokia_mitelalefbet')->pluck('mastawokia_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('tv.mastawokia.mastawokia-list-tv', compact('program', 'mastawokiatv', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
    }

    public function mastawokiaListTvYaltelalefu()
    {
        $program = Tvprogram::all();
        $ken = ProgramKen::all();
        $programmeleyaid = Tvmitelalefbet::all();
        $mastawokiatv = Tvmastawokia::orderBy('created_at', 'desc')
        ->where('is_transmit', 1)
        ->where('not_transmit', 1)
        ->where('is_artayi_check', 1)
        ->orderBy('created_at', 'desc')->paginate(10);
        $prodate = $mastawokiatv->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mastawokiatv->sortBy('mastawokia_mitelalefbet')->pluck('mastawokia_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('tv.mastawokia.mastawokia-list-tv-yaltelalefu', compact('program', 'mastawokiatv', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
    }





    public function mastawokiaCreateFormNewTv(){
        if (auth()->user()->role_id == '2' || auth()->user()->role_id == '1' || auth()->user()->role_id == '8') {
            session()->flash('error', "You are not Allowed to Access this page ፡፡  ");
            return redirect()->back();
        }
        return view('tv.mastawokia.mastawokia-create-formnew-tv')
            ->with('program', Tvprogram::all())
            ->with('ken', ProgramKen::all())
            ->with('programmeleyaid', Tvmitelalefbet::all());
    }

    public function mastawokiaSaveFormNewTv(Request $request){

        $request->validate([
            'program_ken_id' => 'required',
            'mastawokia_mitelalefbet' => 'required',
            'today_date' => 'required',
            'tvmall' => 'required',
        ]);

/*
                'program_ken_id' => 'required',
                'mastawokia_mitelalefbet' => 'required',
                'today_date' => 'required',
                'mastawokia_tekuam.*' => 'required',
                'mastawokia_file.*' => 'required',
                'mastawokia_gize.*' => 'required',
                'mastawokia_mitelalefbet_seat.*' => 'required',
                'mastawokia_diggmosh.*' => 'required',
                'mastawokia_video_id.*' => 'required',
        */


        $mastawokiatv = new Tvmastawokia;
        $mastawokiatv->program_ken_id = $request->program_ken_id;
        $mastawokiatv->mastawokia_mitelalefbet = $request->mastawokia_mitelalefbet;
        $mastawokiatv->today_date = $request->today_date;
        $mastawokiatv->tvmall = $request->tvmall;
        $mastawokiatv->user_id = auth()->user()->id;


        $mastawokiatv->mastawokia_tekuam = 0;
        $mastawokiatv->mastawokia_video_id = 0;
        $mastawokiatv->mastawokia_file = 0;
        $mastawokiatv->mastawokia_gize = 0;
        $mastawokiatv->mastawokia_mitelalefbet_seat = 0;
        $mastawokiatv->mastawokia_diggmosh = 0;
        $mastawokiatv-> created_at = \Carbon\Carbon::now();
        $mastawokiatv-> updated_at = \Carbon\Carbon::now();
        $mastawokiatv->save();


        return response()->json([
            'success' => 'የዛሬ ቀን ማስታወቂያ መዝግበሃል  ፡ ማስተካክለ ከፈለግህ በመዘገብኸው ቀን መርጠህ ኤዲት አርግ .'
        ]);

    }

    public function mastawokiaEditFmFormNewUpdate($id)
    {
        $mastawokiatv = Tvmastawokia::find($id);
        if ((auth()->user()->role_id == '2' || auth()->user()->role_id == '9') && $mastawokiatv->is_artayi_check == '1') {
            session()->flash('error', "ማስታወቂያ ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('fm.mastawokia.mastawokia-edit-fm-formupdate')
            ->with('ken', ProgramKen::all())
            ->with('mastawokia', $mastawokiatv)
            ->with('program', Tvprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Tvmitelalefbet::all());

    }



    public function mastawokiaUpdateFmFormNewSave(Request $request, $id){

//        dd($id);
        $mastawokiatv = Tvmastawokia::findorfail($id);
        $request->validate([
            'program_ken_id' => 'required',
            'mastawokia_mitelalefbet' => 'required',
            'today_date' => 'required',
            'tvmall' => 'required',
        ]);

        $mastawokiatv->program_ken_id = $request->program_ken_id;
        $mastawokiatv->mastawokia_mitelalefbet = $request->mastawokia_mitelalefbet;
        $mastawokiatv->today_date = $request->today_date;
        $mastawokiatv->updated_by = auth()->user()->name;
        $mastawokiatv->tvmall = $request->tvmall;


        $mastawokiatv->mastawokia_tekuam = 0;
        $mastawokiatv->mastawokia_file = 0;
        $mastawokiatv->mastawokia_gize = 0;
        $mastawokiatv->mastawokia_mitelalefbet_seat = 0;
        $mastawokiatv->mastawokia_diggmosh = 0;
        $mastawokiatv-> created_at = \Carbon\Carbon::now();
        $mastawokiatv-> updated_at = \Carbon\Carbon::now();


        $mastawokiatv->save();
        session()->flash('success', "ባሕር ዳር ኤፍኤም ማስታወቂያ አስተካክለህ  መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date-fm', $mastawokiatv->program_ken_id));
    }









}
