<?php

namespace App\Http\Controllers;

use App\Merehagibr;
use App\Mereja;
use App\Miraf;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('logout');
//        $this->middleware('guest')->except('logout');
    }


    public function am()
    {
        return view('programs.am');
    }

    public function programAyidiCreate()
    {
//        $programmeleyaid = DB::table('program_meleyas')->get();
//        return view('programs.program-ayidi-create', compact('programmeleyaid'));
        $programmeleyaid = ProgramMeleya::all();

        if (auth()->user()->role->id  == 1) {
            $proyeteshete = $programmeleyaid->sortBy('yeteshete')->pluck('yeteshete')->unique();
            $proyexpire = $programmeleyaid->sortBy('expire_contract')->pluck('expire_contract')->unique();
            return view('programs.program-ayidi-create', compact('programmeleyaid', 'proyeteshete', 'proyexpire'));
        }

        session()->flash('error', "ፕሮግራም አይዲ መመዝገብ አትችልም");
        return redirect(route('home'));

    }
//    public function programAyidiSearch()
//    {
//        $prosearch = ProgramMeleya::all();
//        return view('programs.program-ayidi-create',compact('proyeteshete'));
//        $programmeleyaid = DB::table('program_meleyas')->get();
//        return view('programs.program-ayidi-create', compact('programmeleyaid'));
//        return view('programs.program-ayidi-create')->with('programmeleyaid', ProgramMeleya::all());

//    }

    public function programAyidiSave(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'unique:program_meleyas'],
            'yeteshete' => ['required']
        ]);
        ProgramMeleya::create([
            'name' => $request->name,
            'yeteshete' => $request->yeteshete


        ]);
        session()->flash('success', "ፕሮግራም አይዲ መዝግበሀል ፡፡  ");
        return redirect(route('program-ayidi-create'));


    }

    public function programAyidiEdit($id)
    {
//        dd($id);
        $prog = ProgramMeleya::find($id);

        $proyeteshete = $prog->pluck('yeteshete')->unique();
        $proyexpire = $prog->pluck('expire_contract')->unique();

        return view('programs.program-ayidi-create', compact('prog', 'proyeteshete', 'proyexpire'));

    }

    public function programAyidiEnd($id)
    {
//        dd($id);
        $prog = ProgramMeleya::find($id);
        $prog->expire_contract = '1';
        $prog->save();
        session()->flash('success', "ፕሮግራም አይዲ ውል አቋርጠሀል  ፡፡  ");
        return redirect(route('program-ayidi-create'));

    }

    public function programAyidiStart($id)
    {
//        dd($id);
        $prog = ProgramMeleya::find($id);
        $prog->expire_contract = '0';
        $prog->save();
        session()->flash('success', "ፕሮግራም አይዲ ውል አድሰሀል ፡፡  ");
        return redirect(route('program-ayidi-create'));

    }

    public function programAyidiUpdate(Request $request, $id)
    {
        $progmeleyaa = ProgramMeleya::find($id);
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'unique:program_meleyas'],
            'yeteshete' => ['required']
        ]);
        $progmeleyaa->name = $request->name;
        $progmeleyaa->yeteshete = $request->yeteshete;
        $progmeleyaa->save();
        session()->flash('success', "ፕሮግራም አይዲ አስተካክለህ መዝግበሀል ፡፡  ");
        return redirect(route('program-ayidi-create'));

    }

    public function programAyidiDelete($id)
    {
        $progmeleyaa = ProgramMeleya::find($id);
        $pro = Program::all()->where('program_meleya_id', $progmeleyaa->id);
        if ($pro->count() > 0) {
            session()->flash('error', ' ፕሮግራም አይዲ Cannot be Deleted ,Because it is associated with ' . $pro->count() . ' Number of Posts');
            return redirect(route('program-ayidi-create'));
        }
        $progmeleyaa->delete();
        session()->flash('success', "ፕሮግራም አይዲ ሰርዘሀል ፡፡  ");
        return redirect(route('program-ayidi-create'));

    }


    public function programApproveAll($id)
    {

        $program = Program::find($id);
        $program->is_artayi_check = '1';
        $program->artayi = auth()->user()->name;
        $program->save();


        session()->flash('success', "ፕሮግራሙ እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function programApproveTech($id)
    {
        $program = Program::find($id);
        $program->is_transmit = '1';
        $program->technician = auth()->user()->name;
        $program->save();
        session()->flash('success', "ፕሮግራሙ መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }


    public function merejaApproveTech($id)
    {
        $mereja = Mereja::find($id);
        $mereja->is_transmit = '1';
        $mereja->technician = auth()->user()->name;
        $mereja->save();
        session()->flash('success', "መረጃና ሙዚቃው  መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function merejaApproveArtayi($id)
    {
        $mereja = Mereja::find($id);

        $mereja->is_artayi_check = '1';
        $mereja->artayi = auth()->user()->name;
        $mereja->save();


        session()->flash('success', "መረጃና ሙዚቃው እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function programCreate()
    {
//        $program_ken = DB::table('program_kens')->get();

//        return view('table_edit', compact('data'));

        return view('programs.program-create')
            ->with('ken', ProgramKen::all())
            ->with('program', Program::all()->sortByDesc('id'))
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function programSave(Request $request)
    {
//dd($request->ajax());
//        dd($request->all());

//        $this->validate($request, [
//            'program_ken' => 'required',
//            'program_mitelalefbet' => 'required',
//            'today_date' => 'required',
//        ]);
//        $rules = [];

        if ($request->ajax()) {
            $rules = array(
                'program_ken' => 'required',
                'program_mitelalefbet' => 'required',
                'today_date' => 'required',

                'program_meleya_id.*' => 'required',
                'program_file.*' => 'required',
                'program_minute.*' => 'required',

                'program_mitelalefbet_seat.*' => 'required',
                'program_mitelalefbet_seat2.*' => 'required',

                'program_yizet.*' => 'required',

                'program_artayi.*' => 'required',
                'program_azegagi.*' => 'required',

            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            } else {
                $program_ken_id = $request->program_ken;
                $program_meleya_id = $request->program_meleya_id;
                $program_mitelalefbet = $request->program_mitelalefbet;
                $program_mitelalefbet_seat = $request->program_mitelalefbet_seat;
                $program_mitelalefbet_seat2 = $request->program_mitelalefbet_seat2;
                $today_date = $request->today_date;
                $program_yizet = $request->program_yizet;
                $program_file = $request->program_file;
                $program_artayi = $request->program_artayi;
                $program_azegagi = $request->program_azegagi;
                $program_minute = $request->program_minute;
                for ($count = 0; $count < count($program_azegagi); $count++) {
                    $data = array(
                        'user_id' => auth()->user()->id,
                        'program_ken_id' => $program_ken_id,
                        'program_mitelalefbet' => $program_mitelalefbet,

                        'today_date' => $today_date,


                        'program_meleya_id' => $program_meleya_id[$count],
                        'program_mitelalefbet_seat' => $program_mitelalefbet_seat[$count],
                        'program_mitelalefbet_seat2' => $program_mitelalefbet_seat2[$count],
                        'program_yizet' => $program_yizet[$count],
                        'program_file' => $program_file[$count],
                        'program_artayi' => $program_artayi[$count],
                        'program_azegagi' => $program_azegagi[$count],
                        'program_minute' => $program_minute[$count],

                        'created_at' => \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now()  # \Datetime()
                    );
                    $insert_data[] = $data;
                }
                Program::insert($insert_data);
                return response()->json([
                    'success' => 'የዛሬ ቀን ፕሮግራም መዝግበሃል  ፡ ማስተካክለ ከፈለግህ በመዘገብኸው ቀን መርጠህ ኤዲት አርግ .'
                ]);

            }
        } else {
            return response()->json([
                'error' => 'Data Insertion Error .'
            ]);
        }

    }


    public function programList()
    {
        // $program = Program::paginate(10) ;
        // $program = Program::orderBy('created_at','desc')->paginate(10) ;
        $program = Program::all()
        ->where('is_transmit', 1)
        ->where('is_artayi_check', 1);
       // ->paginate(10);
        $ken = ProgramKen::all();
        $programmeleyaid = ProgramMeleya::all();
        $prodate = $program->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $program->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('programs.program-list', compact('program', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
//        return view('programs.program-list')


//            ->with('program', Program::all()->sortByDesc('id'))
//            ->with('ken', ProgramKen::all())
//            ->with('programmeleyaid', ProgramMeleya::all());
    }


    public function merejaMusicList()
    {

        $mereja = Mereja::all();
        $program = Program::all();
        $ken = ProgramKen::all();
        $prodate = $mereja->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $mereja->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();


        return view('merejaMusic.mereja-music-list',
            compact('prodate', 'proelet', 'proken', 'mereja'));


//        return view('merejaMusic.mereja-music-list')
//            ->with('program', Program::all())
//            ->with('mereja', Mereja::all())
//            ->with('ken', ProgramKen::all())
//            ->with('users', User::all());
    }

//
//    public function programListByDate($id)
//    {
////       dd($id); is_artayi
//        $ken = ProgramKen::find($id);
//
//
//        return view('programs.program-list-by-date')
//            ->with('ken', $ken)
//            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
//            ->with('mereja', Mereja::all())
//            ->with('program', Program::all()->where('program_ken_id', $id))
//            ->with('programmeleyaid', ProgramMeleya::all());
//
//    }


    public function programListByDateEdit($id)
    {
        $program = Program::findorfail($id);

        if ((auth()->user()->role_id == '2' || auth()->user()->role_id == '8') && $program->is_artayi_check == '1') {

//        if (auth()->user()->is_artayi == '0' && $program->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('programs.program-list-by-date-edit')
            ->with('program', $program)
            ->with('mereja', Mereja::all())
            ->with('ken', ProgramKen::all())
            ->with('users', User::all())

            //            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());


    }

    public function programListByDateUpdate(Request $request, int $id)
    {

//        dd($request->all());
        $program = Program::findorfail($id);
        $this->validate($request, [
            'program_ken' => 'required',
            'program_mitelalefbet' => 'required',
            'today_date' => 'required',

            'program_meleya_id.*' => 'required',
            'program_file.*' => 'required',
            'program_minute.*' => 'required',

            'program_mitelalefbet_seat.*' => 'required',
            'program_mitelalefbet_seat2.*' => 'required',

            'program_yizet.*' => 'required|min:5',

            'program_artayi.*' => 'required',
            'program_azegagi.*' => 'required',
        ]);
        $program->program_ken_id = $request->program_ken;
        $program->program_mitelalefbet = $request->program_mitelalefbet;
        $program->today_date = $request->today_date;
        $program->updated_by = auth()->user()->name;

        $program->program_meleya_id = $request->program_meleya_id;
        $program->program_file = $request->program_file;
        $program->program_minute = $request->program_minute;
        $program->program_mitelalefbet_seat = $request->program_mitelalefbet_seat;
        $program->program_mitelalefbet_seat2 = $request->program_mitelalefbet_seat2;
        $program->program_yizet = $request->program_yizet;
        $program->program_artayi = $request->program_artayi;
        $program->program_azegagi = $request->program_azegagi;
        $program->save();
        session()->flash('success', "የዛሬ ቀን ፕሮግራም አስተካክለህ መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date', $program->program_ken_id));

    }

    public function programListByDateDelete($id)
    {

//        dd($id);
        $program = Program::findorfail($id);

        if ((auth()->user()->role_id == '2' || auth()->user()->role_id == '8') && $program->is_artayi_check == '1') {
//        if ((auth()->user()->is_artayi == '0' || auth()->user()->is_artayi == '3') && $program->is_artayi_check == '1') {
//        if (auth()->user()->is_artayi == '0' && $program->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም መሰረዝ  አትችልም ፡ ፕሮግራም አርታኦ አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        $program->delete();
        session()->flash('success', "ፕሮግራም ሰርዘሀል / You have delete a program successfully  ፡፡  ");
        return redirect(route('program-list-by-date', $program->program_ken_id));

    }


    public function programMerejaMusicCreate()
    {
        return view('merejaMusic.program-mereja-music-create')
            ->with('ken', ProgramKen::all())
            ->with('program', Program::all())
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function programMerejaMusicSave(Request $request)
    {
        $this->validate($request, [
            'today_date' => 'required',
            'program_ken_id' => 'required',
            'program_mitelalefbet' => 'required',
            'mereja' => 'required',
            'music' => 'required',
        ]);
        Mereja::create([

            'today_date' => $request->today_date,
            'program_ken_id' => $request->program_ken_id,
            'program_mitelalefbet' => $request->program_mitelalefbet,
            'mereja' => $request->mereja,
            'music' => $request->music,
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'መረጃና ሙዚቃ በትክክል መዝግበሀል ፡፡ ');
        return redirect(route('program-mereja-music-create'));
    }

    public function programMerejaMusicEdit($id)
    {

        $mereja = Mereja::findorfail($id);

        if (auth()->user()->role_id == '2' && $mereja->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('merejaMusic.program-mereja-music-edit')
            ->with('ken', ProgramKen::all())
            ->with('mereja', $mereja)
            ->with('program', Program::all())
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function programMerejaMusicUpdate(Request $request, $id)
    {
//        dd($request->all());
        $mereja = Mereja::findorfail($id);
        $this->validate($request, [
            'today_date' => 'required',
            'program_ken_id' => 'required',
            'program_mitelalefbet' => 'required',
            'mereja' => 'required',
            'music' => 'required',
        ]);
        $mereja->today_date = $request->today_date;
        $mereja->program_ken_id = $request->program_ken_id;
        $mereja->program_mitelalefbet = $request->program_mitelalefbet;
        $mereja->mereja = $request->mereja;
        $mereja->music = $request->music;

        $mereja->save();


        session()->flash('success', 'መረጃና ሙዚቃ አስተካክለህ ለከሀል ፡፡ ');
        return redirect(route('program-list-by-date', $mereja->program_ken_id));

    }

    public function programMerejaMusicDelete($id)
    {
//        dd($id);

        $mereja = Mereja::findorfail($id);
        if (auth()->user()->role_id == '2' && $mereja->is_artayi_check == '1') {
            session()->flash('error', "መረጃና ሙዚቃ   መሰረዝ  አትችልም ፡ ፕሮግራም አርታኦ አጽድቆታል   ፡፡  ");
            return redirect()->back();
        }
        $mereja->delete();
        session()->flash('success', "መረጃና ሙዚቃ ሰርዘሀል / You have delete a መረጃና ሙዚቃ successfully  ፡፡  ");
        return redirect(route('program-list-by-date', $mereja->program_ken_id));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function MerehagibrCreate()
    {
        if (auth()->user()->role_id == 1) {
            return view('programs.merehagibr-create')
                ->with('merehagibr', Merehagibr::all())
                ->with('miraf', Miraf::all())
                ->with('ken', ProgramKen::all());
        }
        session()->flash('error', 'You are not Allowed to Access this page፡፡ ');

        return redirect(route('home'));
    }

    public function merehagibrSave(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'program_ken_id' => 'required',
            'miraf_id' => 'required',
        ]);
        $mr = Merehagibr::all();
        foreach ($mr as $m){
            if ($request->miraf_id == $m->miraf_id && $request->program_ken_id == $m->program_ken_id) {
                session()->flash('error', 'የሥርጭት ቅደም ተከተል መርሐ ግብሩ ስለተመዘገበ ድጋሚ መመዝገብ አትችልም ። ');
                return redirect()->back();

            }
        }
        Merehagibr::create([
            'name' => $request->name,
            'program_ken_id' => $request->program_ken_id,
            'miraf_id' => $request->miraf_id,
        ]);
        session()->flash('success', 'ሳምንታዊ  የአማራ ራዲዮ የስርጭት መርሃ ግብር መዝግበሀል፡፡ ');
        return redirect(route('home'));
    }

    public function MerehagibrEdit($id)
    {
        $mereha = Merehagibr::findorfail($id);
        return view('programs.merehagibr-create')
            ->with('mereha', $mereha)
            ->with('miraf', Miraf::all())
            ->with('ken', ProgramKen::all());
    }

    public function merehagibrUpdate(Request $request, $id)
    {
        $mereha = Merehagibr::findorfail($id);
        $this->validate($request, [
            'name' => 'required',
            'program_ken_id' => 'required',
            'miraf_id' => 'required',
        ]);
        $mereha->name = $request->name;
        $mereha->program_ken_id = $request->program_ken_id;
        $mereha->miraf_id = $request->miraf_id;

        $mereha->save();


        session()->flash('success', 'ሳምንታዊ  የአማራ ራዲዮ የስርጭት መርሃ ግብር አስተካክለሀል ፡፡ ');
        return redirect(route('home'));

    }
}
