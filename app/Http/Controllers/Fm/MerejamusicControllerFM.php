<?php

namespace App\Http\Controllers\Fm;

use App\Fmmelaya;
use App\Fmmereja;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\Mereja;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use Illuminate\Http\Request;

class MerejamusicControllerFM extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('logout');
//        $this->middleware('guest')->except('logout');
    }


    public function programMerejaMusicCreateFm()
    {
        return view('fm.merejaMusic.program-mereja-music-create-fm')
            ->with('ken', ProgramKen::all())
            ->with('program', Fmprogram::all())
            ->with('programmeleyaid', Fmmelaya::all());
    }

    public function programMerejaMusicSaveFm(Request $request)
    {
        $this->validate($request, [
            'today_date' => 'required',
            'program_ken_id' => 'required',
            'program_mitelalefbet' => 'required',
            'mereja' => 'required',
            'music' => 'required',
        ]);
        Fmmereja::create([

            'today_date' => $request->today_date,
            'program_ken_id' => $request->program_ken_id,
            'program_mitelalefbet' => $request->program_mitelalefbet,
            'mereja' => $request->mereja,
            'music' => $request->music,
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'መረጃና ሙዚቃ በትክክል መዝግበሀል ፡፡ ');
        return redirect(route('program-mereja-music-create-fm'));
    }




    public function merejaMusicListFm()
    {

        $mereja = Fmmereja::all();
        $program = Fmprogram::all();
        $ken = ProgramKen::all();
        $prodate = $program->sortByDesc('today_date')->pluck('today_date')->unique();
        $proelet = $program->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
        $proken = $ken->sortBy('id')->pluck('name')->unique();


        return view('fm.merejaMusic.mereja-music-list-fm',
            compact('prodate', 'proelet', 'proken', 'mereja'));
    }


    public function programMerejaMusicEditFm($id)
    {

        $mereja = Fmmereja::findorfail($id);

        if (auth()->user()->role_id == '6' && $mereja->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('fm.merejaMusic.program-mereja-music-edit-fm')
            ->with('ken', ProgramKen::all())
            ->with('mereja', $mereja)
            ->with('program', Fmprogram::all())
            ->with('programmeleyaid', Fmmelaya::all());
    }

    public function programMerejaMusicUpdateFm(Request $request, $id)
    {
//        dd($request->all());
        $mereja = Fmmereja::findorfail($id);
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
        return redirect(route('program-list-by-date-fm', $mereja->program_ken_id));

    }

    public function programMerejaMusicDeleteFm($id)
    {
//        dd($id);

        $mereja = Fmmereja::findorfail($id);
        if (auth()->user()->role_id == '6' && $mereja->is_artayi_check == '1') {
            session()->flash('error', "መረጃና ሙዚቃ   መሰረዝ  አትችልም ፡ ፕሮግራም አርታኦ አጽድቆታል   ፡፡  ");
            return redirect()->back();
        }
        $mereja->delete();
        session()->flash('success', "መረጃና ሙዚቃ ሰርዘሀል / You have delete a መረጃና ሙዚቃ successfully  ፡፡  ");
//        return redirect(route('program-list-by-date-fm', $mereja->program_ken_id));
        return redirect()->back();


    }


    public function merejaApproveTechFm($id)
    {
        $mereja = Fmmereja::find($id);
        $mereja->is_transmit = '1';
        $mereja->technician = auth()->user()->name;
        $mereja->save();
        session()->flash('success', "መረጃና ሙዚቃው  መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function merejaApproveArtayiFm($id)
    {
        $mereja = Fmmereja::find($id);

        $mereja->is_artayi_check = '1';
        $mereja->artayi = auth()->user()->name;
        $mereja->save();


        session()->flash('success', "መረጃና ሙዚቃው እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }


}
