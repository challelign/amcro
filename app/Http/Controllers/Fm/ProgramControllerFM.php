<?php

namespace App\Http\Controllers\Fm;

use App\Fmmelaya;
use App\Fmmerehagibr;
use App\Fmmereja;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\ProgramKen;
use App\Tvmitelalefbet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramControllerFM extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('logout');
//        $this->middleware('guest')->except('logout');
    }


    public function programTemplateCreateFm()
    {
        if ((auth()->user()->role->id == 6)) {
            session()->flash('error', 'You are not allowed to access this page!፡ ');
            return redirect()->back();
        }

        return view('fm.program-template-fm')
            ->with('ken', ProgramKen::all())
            ->with('tvm', Tvmitelalefbet::all());
    }

    public function programTemplateSaveFm(Request $request)
    {
//        program_ken_id
        $this->validate($request, [
            'name' => 'required|min:10',
            'program_ken_id' => 'required',
            'tvmitelalefbet_id' => 'required',
        ]);
        $fmm = Fmmerehagibr::all();
        foreach ($fmm as $fm) {
            if ($request->tvmitelalefbet_id == $fm->tvmitelalefbet_id && $request->program_ken_id == $fm->program_ken_id) {
                session()->flash('error', 'የሥርጭት ቅደም ተከተል መርሐ ግብሩ ስለተመዘገበ ድጋሚ መመዝገብ አትችልም ። ');
                return redirect()->back();
            }
        }

        Fmmerehagibr::create([
            'name' => $request->name,
            'program_ken_id' => $request->program_ken_id,
            'tvmitelalefbet_id' => $request->tvmitelalefbet_id,
        ]);
        session()->flash('success', 'የሥርጭት ቅደም ተከተል ለአብነት ሚሆን መዝግበሀል፡፡ ');
        return redirect()->back();
    }

    public function programTemplateEditFm(Request $request, $id)
    {
        if ((auth()->user()->role->id == 6)) {
            session()->flash('error', 'You are not allowed to access this page!፡ ');
            return redirect()->back();
        }
        $tvpcontent = Fmmerehagibr::find($id);
        return view('fm.program-template-edit-fm')
            ->with('tvpcontent', $tvpcontent)
            ->with('ken', ProgramKen::all());
    }

    public function programTemplateUpdateFm(Request $request, $id)
    {
        $tvpcontent = Fmmerehagibr::find($id);

        $this->validate($request, [
            'name' => 'required|min:30',
        ]);
        $tvpcontent->name = $request->name;
        $tvpcontent->save();
        session()->flash('success', 'የሥርጭት ቅደም ተከተል ለአብነት ሚሆን አስተካክለሀል ፡፡ ');
        return redirect(route('home'));
    }


    public function programAyidiCreateFm()
    {

        $meleyafm = Fmmelaya::all();

        if ((auth()->user()->role->id == 5)) {
            $proyeteshete = $meleyafm->sortBy('yeteshete')->pluck('yeteshete')->unique();
            $proyexpire = $meleyafm->sortBy('expire_contract')->pluck('expire_contract')->unique();
            return view('fm.programs.program-ayidi-create-fm', compact('meleyafm', 'proyeteshete', 'proyexpire'));
        }

        session()->flash('error', "ፕሮግራም አይዲ መመዝገብ አትችልም");
        return redirect(route('home'));

    }


    public function programAyidiSaveFm(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'unique:fmmelayas'],
            'yeteshete' => ['required']
        ]);
        Fmmelaya::create([
            'name' => $request->name,
            'yeteshete' => $request->yeteshete
        ]);
        session()->flash('success', "ፕሮግራም አይዲ መዝግበሀል ፡፡  ");
        return redirect(route('program-ayidi-create-fm'));
    }

    public function programAyidiEditFm($id)
    {

        $progfm = Fmmelaya::find($id);

        $proyeteshete = $progfm->pluck('yeteshete')->unique();
        $proyexpire = $progfm->pluck('expire_contract')->unique();

        return view('fm.programs.program-ayidi-create-fm', compact('progfm', 'proyeteshete', 'proyexpire'));

    }

    public function programAyidiUpdateFm(Request $request, $id)
    {
        $meleyafm = Fmmelaya::find($id);
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'unique:fmmelayas'],
            'yeteshete' => ['required']
        ]);
        $meleyafm->name = $request->name;
        $meleyafm->yeteshete = $request->yeteshete;
        $meleyafm->save();
        session()->flash('success', "ፕሮግራም አይዲ አስተካክለህ መዝግበሀል ፡፡  ");
        return redirect(route('program-ayidi-create-fm'));

    }

    public function programAyidiDeleteFm($id)
    {
        $meleyafm = Fmmelaya::find($id);
        $pro = Fmprogram::all()->where('program_meleya_id', $meleyafm->id);
        if ($pro->count() > 0) {
            session()->flash('error', ' ፕሮግራም አይዲ Cannot be Deleted ,Because it is associated with ' . $pro->count() . ' Number of Posts');
            return redirect(route('program-ayidi-create-fm'));
        }
        $meleyafm->delete();
        session()->flash('success', "ፕሮግራም አይዲ ሰርዘሀል ፡፡  ");
        return redirect(route('program-ayidi-create-fm'));

    }


    public function programAyidiEndFm($id)
    {
//        dd($id);
        $progfm = Fmmelaya::find($id);
        $progfm->expire_contract = '1';
        $progfm->save();
        session()->flash('success', "ፕሮግራም አይዲ ውል አቋርጠሀል  ፡፡  ");
        return redirect(route('program-ayidi-create-fm'));

    }

    public function programAyidiStartFm($id)
    {
//        dd($id);
        $progfm = Fmmelaya::find($id);
        $progfm->expire_contract = '0';
        $progfm->save();
        session()->flash('success', "ፕሮግራም አይዲ ውል አድሰሀል ፡፡  ");
        return redirect(route('program-ayidi-create-fm'));

    }


    public function programCreateFm()
    {
        return view('fm.programs.program-create-fm')
            ->with('ken', ProgramKen::all())
            ->with('programfm', Fmprogram::all()->sortByDesc('id'))
            ->with('meleyafm', Fmmelaya::all());
    }

    public function programSaveFm(Request $request)
    {
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
                Fmprogram::insert($insert_data);
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

    public function programListFm()
    {
        $program = Fmprogram::all();
        $ken = ProgramKen::all();
        $programmeleyaid = Fmmelaya::all();
        $prodate = $program->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $program->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('fm.programs.program-list-fm', compact('program', 'ken', 'programmeleyaid', 'proelet', 'prodate', 'proken'));
//        return view('programs.program-list')


//            ->with('program', Program::all()->sortByDesc('id'))
//            ->with('ken', ProgramKen::all())
//            ->with('programmeleyaid', ProgramMeleya::all());
    }


    public function programListByDateEditFm($id)
    {
        $programfm = Fmprogram::findorfail($id);

        if ((auth()->user()->role_id == '6' || auth()->user()->role_id == '8') && $programfm->is_artayi_check == '1') {

//        if (auth()->user()->is_artayi == '0' && $program->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('fm.programs.program-list-by-date-edit-fm')
            ->with('program', $programfm)
            ->with('merejafm', Fmmereja::all())
            ->with('ken', ProgramKen::all())
            ->with('users', User::all())

            //            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', Fmmelaya::all());


    }

    public function programListByDateUpdateFm(Request $request, int $id)
    {
        $programfm = Fmprogram::findorfail($id);
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
        $programfm->program_ken_id = $request->program_ken;
        $programfm->program_mitelalefbet = $request->program_mitelalefbet;
        $programfm->today_date = $request->today_date;
        $programfm->updated_by = auth()->user()->name;
        $programfm->program_meleya_id = $request->program_meleya_id;
        $programfm->program_file = $request->program_file;
        $programfm->program_minute = $request->program_minute;
        $programfm->program_mitelalefbet_seat = $request->program_mitelalefbet_seat;
        $programfm->program_mitelalefbet_seat2 = $request->program_mitelalefbet_seat2;
        $programfm->program_yizet = $request->program_yizet;
        $programfm->program_artayi = $request->program_artayi;
        $programfm->program_azegagi = $request->program_azegagi;
        $programfm->save();
        session()->flash('success', "የዛሬ ቀን ፕሮግራም አስተካክለህ መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date-fm', $programfm->program_ken_id));
    }

    public function programListByDateDeleteFm($id)
    {
        $programfm = Fmprogram::findorfail($id);
        if ((auth()->user()->role_id == '6' || auth()->user()->role_id == '8') && $programfm->is_artayi_check == '1') {
//        if ((auth()->user()->is_artayi == '0' || auth()->user()->is_artayi == '3') && $program->is_artayi_check == '1') {
//        if (auth()->user()->is_artayi == '0' && $program->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም መሰረዝ  አትችልም ፡ ፕሮግራም አርታኦ አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        $programfm->delete();
        session()->flash('success', "ፕሮግራም ሰርዘሀል / You have delete a program successfully  ፡፡  ");
//        return redirect(route('program-list-by-date-fm', $programfm->program_ken_id));
        return redirect()->back();
    }

    public function programApproveAllFm($id)
    {
        $programfm = Fmprogram::find($id);
        $programfm->is_artayi_check = '1';
        $programfm->artayi = auth()->user()->name;
        $programfm->save();

        session()->flash('success', "ፕሮግራሙ እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function programApproveTechFm($id)
    {
        $programfm = Fmprogram::find($id);
        $programfm->is_transmit = '1';
        $programfm->technician = auth()->user()->name;
        $programfm->save();
        session()->flash('success', "ፕሮግራሙ መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }
}
