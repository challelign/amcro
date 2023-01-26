<?php

namespace App\Http\Controllers;

use App\Mastawokia;
use App\Mereja;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MastawokiaController extends Controller
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
    public function mastawokiaCreate()
    {
        if (auth()->user()->role_id == '2' || auth()->user()->role_id == '1' || auth()->user()->role_id == '8') {
            session()->flash('error', "You are not Allowed to Access this page ፡፡  ");
            return redirect()->back();
        }
        return view('mastawokia.mastawokia-create')
            ->with('program', Program::all())
            ->with('ken', ProgramKen::all())
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function mastawokiaList()
    {
        $program = Program::all();
        $ken = ProgramKen::all();
        $programmeleyaid = ProgramMeleya::all();
        // $mastawokia = Mastawokia::orderBy('created_at','desc')->paginate(10) ;
        $mastawokia = Mastawokia::orderBy('created_at', 'desc')
        ->where('is_transmit', 1)
        ->where('not_transmit', 0)
        ->where('is_artayi_check', 1)
        ->orderBy('created_at', 'desc')->paginate(10);
        $prodate = $mastawokia->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mastawokia->sortBy('mastawokia_mitelalefbet')->pluck('mastawokia_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('mastawokia.mastawokia-list', compact('program', 'mastawokia', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
//        return view('programs.program-list')


//
//        return view('mastawokia.mastawokia-list')
//            ->with('program', Program::all())
//            ->with('ken', ProgramKen::all())
//            ->with('mastawokia', Mastawokia::all())
//            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function mastawokiaListYaltelalefu()
    {
        $program = Program::all();
        $ken = ProgramKen::all();
        $programmeleyaid = ProgramMeleya::all();
        // $mastawokia = Mastawokia::orderBy('created_at','desc')->paginate(10) ;
        $mastawokia = Mastawokia::orderBy('created_at', 'desc')
        ->where('is_transmit', 1)
        ->where('not_transmit', 1)
        ->where('is_artayi_check', 1)
        ->orderBy('created_at', 'desc')->paginate(10);
        $prodate = $mastawokia->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mastawokia->sortBy('mastawokia_mitelalefbet')->pluck('mastawokia_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('mastawokia.mastawokia-list-yaltelalefu', compact('program', 'mastawokia', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
    }


    public function mastawokiaSave(Request $request)
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
                Mastawokia::insert($insert_data);
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

    public function mastawokiaEdit($id)
    {
//       dd($id);
        $mastawokia = Mastawokia::find($id);
        if ((auth()->user()->role_id == '2' || auth()->user()->role_id == '9') && $mastawokia->is_artayi_check == '1') {
            session()->flash('error', "ማስታወቂያ ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('mastawokia.mastawokia-edit')
            ->with('ken', ProgramKen::all())
            ->with('mastawokia', $mastawokia)
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());

    }

    public function mastawokiaUpdate(Request $request, int $id)
    {
//        dd($request->all());
        $mastawokia = Mastawokia::findorfail($id);
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

        $mastawokia->program_ken_id = $request->program_ken_id;
        $mastawokia->mastawokia_mitelalefbet = $request->mastawokia_mitelalefbet;
        $mastawokia->today_date = $request->today_date;
        $mastawokia->updated_by = auth()->user()->name;
        $mastawokia->mastawokia_file = $request->mastawokia_file;
        $mastawokia->mastawokia_tekuam = $request->mastawokia_tekuam;
        $mastawokia->mastawokia_gize = $request->mastawokia_gize;
        $mastawokia->mastawokia_mitelalefbet_seat = $request->mastawokia_mitelalefbet_seat;
        $mastawokia->mastawokia_diggmosh = $request->mastawokia_diggmosh;
//        $mastawokia->mastawokia_Yetestenagedew_meten = $request->mastawokia_Yetestenagedew_meten;

        $mastawokia->save();
        session()->flash('success', "ማስታወቂያ አስተካክለህ  መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date', $mastawokia->program_ken_id));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function mastawokiaDelete($id)
    {
        $mastawokia = Mastawokia::find($id);
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


    public function mastawokiaApproveTech($id)
    {
        $mastawokia = Mastawokia::find($id);
        $mastawokia->is_transmit = '1';
        $mastawokia->not_transmit = '0';

        $mastawokia->technician = auth()->user()->name;
        $mastawokia->save();
        session()->flash('success', "ማስታወቂያው  መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function mastawokiaApproveTechNot($id)
    {
        $mastawokia = Mastawokia::find($id);
        $mastawokia->is_transmit = '1';
        $mastawokia->not_transmit = '1';
        $mastawokia->technician_not = auth()->user()->name;
        $mastawokia->save();
        session()->flash('success', "ማስታወቂያው  አልተላለፈም ፡፡  ");
        return redirect()->back();

    }


    public function mastawokiaApproveArtayi($id)
    {
        $mastawokia = Mastawokia::find($id);

        $mastawokia->is_artayi_check = '1';
        $mastawokia->artayi = auth()->user()->name;
        $mastawokia->save();


        session()->flash('success', "ማስታወቂያው እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

}
