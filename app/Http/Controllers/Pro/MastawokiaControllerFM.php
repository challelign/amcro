<?php

namespace App\Http\Controllers\Pro;

use App\Fmmastawokia;
use App\Fmmelaya;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\Mereja;
use App\ProgramKen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MastawokiaControllerFM extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth'])->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mastawokiaCreateFm()
    {
        if (auth()->user()->role_id == '2' || auth()->user()->role_id == '1' || auth()->user()->role_id == '8') {
            session()->flash('error', "You are not Allowed to Access this page ፡፡  ");
            return redirect()->back();
        }
        return view('fm.mastawokia.mastawokia-create-fm')
            ->with('program', Fmprogram::all())
            ->with('ken', ProgramKen::all())
            ->with('programmeleyaid', Fmmelaya::all());
    }

    public function mastawokiaListFm()
    {
        $program = Fmprogram::all();
        $ken = ProgramKen::all();
        $programmeleyaid = Fmmelaya::all();
        $mastawokiafm = Fmmastawokia::all();
        $prodate = $mastawokiafm->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mastawokiafm->sortBy('mastawokia_mitelalefbet')->pluck('mastawokia_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('fm.mastawokia.mastawokia-list-fm', compact('program', 'mastawokiafm', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
    }

    public function mastawokiaListFmYaltelalefu()
    {
        $program = Fmprogram::all();
        $ken = ProgramKen::all();
        $programmeleyaid = Fmmelaya::all();
        $mastawokiafm = Fmmastawokia::all();
        $prodate = $mastawokiafm->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mastawokiafm->sortBy('mastawokia_mitelalefbet')->pluck('mastawokia_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('fm.mastawokia.mastawokia-list-fm-yaltelalefu', compact('program', 'mastawokiafm', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
    }


    public function mastawokiaSaveFm(Request $request)
    {

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
//                $mastawokia_Yetestenagedew_meten = $request->mastawokia_Yetestenagedew_meten;

                for ($count = 0; $count < count($mastawokia_diggmosh); $count++) {
                    $data = array(
                        'user_id' => auth()->user()->id,
                        'program_ken_id' => $program_ken_id,
                        'mastawokia_mitelalefbet' => $mastawokia_mitelalefbet,
                        'today_date' => $today_date,
                        'mastawokia_tekuam' => $mastawokia_tekuam[$count],
                        'mastawokia_file' => $mastawokia_file[$count],

                        'mastawokia_mitelalefbet_seat' => $mastawokia_mitelalefbet_seat[$count],
                        'mastawokia_gize' => $mastawokia_gize[$count],
                        'mastawokia_diggmosh' => $mastawokia_diggmosh[$count],
//                        'mastawokia_Yetestenagedew_meten' => $mastawokia_Yetestenagedew_meten[$count],


                        'created_at' => \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now()  # \Datetime()
                    );
                    $insert_data[] = $data;
                }
                Fmmastawokia::insert($insert_data);
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

    public function mastawokiaEditFm($id)
    {
//       dd($id);
        $mastawokiafm = Fmmastawokia::find($id);
        if ((auth()->user()->role_id == '2' || auth()->user()->role_id == '9') && $mastawokiafm->is_artayi_check == '1') {
            session()->flash('error', "ማስታወቂያ ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('fm.mastawokia.mastawokia-edit-fm')
            ->with('ken', ProgramKen::all())
            ->with('mastawokia', $mastawokiafm)
            ->with('mereja', Mereja::all())
            ->with('program', Fmprogram::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());

    }

    public function mastawokiaUpdateFm(Request $request, int $id)
    {
//        dd($request->all());
        $mastawokiafm = Fmmastawokia::findorfail($id);
        $this->validate($request, [
            'program_ken_id' => 'required',
            'mastawokia_mitelalefbet' => 'required',
            'today_date' => 'required',
            'mastawokia_tekuam.*' => 'required',
            'mastawokia_file.*' => 'required',
            'mastawokia_gize.*' => 'required',
            'mastawokia_mitelalefbet_seat.*' => 'required',
            'mastawokia_diggmosh.*' => 'required',
//            'mastawokia_Yetestenagedew_meten.*' => 'required',
        ]);

        $mastawokiafm->program_ken_id = $request->program_ken_id;
        $mastawokiafm->mastawokia_mitelalefbet = $request->mastawokia_mitelalefbet;
        $mastawokiafm->today_date = $request->today_date;
        $mastawokiafm->updated_by = auth()->user()->name;
        $mastawokiafm->mastawokia_file = $request->mastawokia_file;
        $mastawokiafm->mastawokia_tekuam = $request->mastawokia_tekuam;
        $mastawokiafm->mastawokia_gize = $request->mastawokia_gize;
        $mastawokiafm->mastawokia_mitelalefbet_seat = $request->mastawokia_mitelalefbet_seat;
        $mastawokiafm->mastawokia_diggmosh = $request->mastawokia_diggmosh;
//        $mastawokia->mastawokia_Yetestenagedew_meten = $request->mastawokia_Yetestenagedew_meten;

        $mastawokiafm->save();
        session()->flash('success', "ባሕር ዳር ኤፍኤም ማስታወቂያ አስተካክለህ  መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date-fm', $mastawokiafm->program_ken_id));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function mastawokiaDeleteFm($id)
    {
//        dd($id);
        $mastawokia = Fmmastawokia::find($id);
        if ((auth()->user()->role_id == '9') && $mastawokia->is_artayi_check == '1') {
//        if (auth()->user()->is_artayi == '0' && $mastawokia->is_artayi_check == '1') {
            session()->flash('error', "ማስታወቂያ መሰረዝ አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        $mastawokia->delete();
        session()->flash('success', " ማስታወቂያ  ሰርዘሀል / You have delete a mastawokia successfully  ፡፡  ");
//        return redirect(route('program-list-by-date', $mastawokia->program_ken_id));
        return redirect()->back();
    }


    public function mastawokiaApproveTechFm($id)
    {
        $mastawokia = Fmmastawokia::find($id);
        $mastawokia->is_transmit = '1';
        $mastawokia->not_transmit = '0';

        $mastawokia->technician = auth()->user()->name;
        $mastawokia->save();
        session()->flash('success', "ማስታወቂያው  መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function mastawokiaApproveTechNotFm($id)
    {
        $mastawokia = Fmmastawokia::find($id);
        $mastawokia->not_transmit = '1';
        $mastawokia->is_transmit = '1';
        $mastawokia->technician_not = auth()->user()->name;
        $mastawokia->save();
        session()->flash('success', "ማስታወቂያው  አልተላለፈም ፡፡  ");
        return redirect()->back();

    }


    public function mastawokiaApproveArtayiFm($id)
    {
        $mastawokia = Fmmastawokia::find($id);

        $mastawokia->is_artayi_check = '1';
        $mastawokia->artayi = auth()->user()->name;
        $mastawokia->save();


        session()->flash('success', "ማስታወቂያው እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }
}
