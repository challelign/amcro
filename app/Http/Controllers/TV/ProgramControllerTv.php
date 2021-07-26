<?php

namespace App\Http\Controllers\TV;

use App\Http\Controllers\Controller;
use App\ProgramKen;
use App\ProgramMeleya;
use App\Tvmitelalefbet;
use App\Tvpcontent;
use App\Tvprogram;
use App\User;
use Illuminate\Http\Request;

class ProgramControllerTv extends Controller
{

    public function programCreateTv()
    {
//        $program_ken = DB::table('program_kens')->get();

//        return view('table_edit', compact('data'));

        return view('tv.program-create-tv')
            ->with('ken', ProgramKen::all())
            ->with('programtv', Tvprogram::all()->sortByDesc('id'))
            ->with('tvm', Tvmitelalefbet::all())
            ->with('tvpc', Tvpcontent::all())
            ->with('programmeleyaid', ProgramMeleya::all());

    }

    public function findProductName(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        $ken = ProgramKen::all();
        //$request->id here is the id of our chosen option id
//        $data = Tvmitelalefbet::select('name', 'id')->where('tvpcontent_id', $request->id)->take(100)->get();
        $data = Tvpcontent::select('tvmitelalefbet_id', 'id')->where('program_ken_id', $request->id)->take(100)->get();
//        $data= Tvmitelalefbet::select('name','id')->where('id',$request->id)->take(100)->get();

//        dd($data);
        return response()->json($data);//then sent this data to ajax success
    }

    public function findProductNameContent(Request $request)
    { // mitelalefbet id

        //it will get price if its id match with product id
        $p = Tvpcontent::select('name', 'tvmitelalefbet_id', 'id')->where('id', $request->id)->first();
        return response()->json($p);
    }

    public function programSaveTv(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'program_ken' => 'required',
            'program_mitelalefbet' => 'required',
            'today_date' => 'required',
            'program_yizet' => 'required|min:30'
        ]);

        Tvprogram::create([
            'user_id' => auth()->user()->id,
            'program_ken_id' => $request->program_ken,
            'program_mitelalefbet' => $request->program_mitelalefbet,
            'today_date' => $request->today_date,
            'program_yizet' => $request->program_yizet,

        ]);
        session()->flash('success', "የዛሬ ቀን ፕሮግራም መዝግበሃል  ፡ ማስተካክለ ከፈለግህ በመዘገብኸው ቀን መርጠህ ኤዲት አርግ .፡፡  ");
        return redirect(route('home'));


    }

    public function programListByDateEditTv($id)
    {
        $programtv = Tvprogram::findorfail($id);

        if ((auth()->user()->role_id == '4' || auth()->user()->role_id == '7') && $programtv->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም ማስተካክል አትችልም ፡ ፕሮግራም አርታኢ  አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        return view('tv.programs.program-list-by-date-edit-tv')
            ->with('programtv', $programtv)
            ->with('ken', ProgramKen::all())
            ->with('tvm', Tvmitelalefbet::all())
            ->with('tvpc', Tvpcontent::all())
            ->with('users', User::all());


    }

    public function programListByDateUpdateTv(Request $request, int $id)
    {
        $programtv = Tvprogram::findorfail($id);
        $this->validate($request, [
            'program_ken' => 'required',
            'program_mitelalefbet' => 'required',
            'today_date' => 'required',
            'program_yizet' => 'required|min:30'
        ]);
        $programtv->program_ken_id = $request->program_ken;
        $programtv->program_mitelalefbet = $request->program_mitelalefbet;
        $programtv->today_date = $request->today_date;
        $programtv->updated_by = auth()->user()->name;
        $programtv->program_yizet = $request->program_yizet;

        $programtv->save();
        session()->flash('success', "የዛሬ ቀን ፕሮግራም አስተካክለህ መዝግበሀል ፡፡  ");
        return redirect(route('program-list-by-date-tv', $programtv->program_ken_id));
    }

    public function programListByDateDeleteTv($id)
    {
        $programtv = Tvprogram::findorfail($id);
        if ((auth()->user()->role_id == '4' || auth()->user()->role_id == '7') && $programtv->is_artayi_check == '1') {
            session()->flash('error', "ፕሮግራም መሰረዝ  አትችልም ፡ ፕሮግራም አርታኦ አጽድቆታል  ፡፡  ");
            return redirect()->back();
        }
        $programtv->delete();
        session()->flash('success', "ፕሮግራም ሰርዘሀል / You have delete a program successfully  ፡፡  ");
//        return redirect(route('program-list-by-date-fm', $programfm->program_ken_id));
        return redirect()->back();
    }

    public function programTemplateCreate()
    {
        return view('tv.program-template')
            ->with('ken', ProgramKen::all())
            ->with('tvm', Tvmitelalefbet::all());
    }

    public function programTemplateSave(Request $request)
    {
//        program_ken_id
        $this->validate($request, [
            'name' => 'required|min:30',
            'program_ken_id' => 'required',
            'tvmitelalefbet_id' => 'required',
        ]);
        $tvpcontent = Tvpcontent::all();
        foreach ($tvpcontent as $pcontent) {
            if ($request->tvmitelalefbet_id == $pcontent->tvmitelalefbet_id && $request->program_ken_id == $pcontent->program_ken_id) {
                session()->flash('error', 'የሥርጭት ቅደም ተከተል መርሐ ግብሩ ስለተመዘገበ ድጋሚ መመዝገብ አትችልም ። ');
                return redirect()->back();
            }
        }

        Tvpcontent::create([
            'name' => $request->name,
            'program_ken_id' => $request->program_ken_id,
            'tvmitelalefbet_id' => $request->tvmitelalefbet_id,
        ]);
        session()->flash('success', 'የሥርጭት ቅደም ተከተል ለአብነት ሚሆን መዝግበሀል፡፡ ');
        return redirect()->back();
    }

    public function programTemplateEdit(Request $request, $id)
    {

        $tvpcontent = Tvpcontent::find($id);
        return view('tv.program-template-edit')
            ->with('tvpcontent', $tvpcontent)
            ->with('ken', ProgramKen::all());
    }

    public function programTemplateUpdate(Request $request, $id)
    {
        $tvpcontent = Tvpcontent::find($id);

        $this->validate($request, [
            'name' => 'required|min:30',
        ]);
        $tvpcontent->name = $request->name;
        $tvpcontent->save();
        session()->flash('success', 'የሥርጭት ቅደም ተከተል ለአብነት ሚሆን አስተካክለሀል ፡፡ ');
        return redirect(route('home'));
    }


    public function programApproveAllTv($id)
    {
        $programtv = Tvprogram::find($id);
        $programtv->is_artayi_check = '1';
        $programtv->artayi = auth()->user()->name;
        $programtv->save();

        session()->flash('success', "ፕሮግራሙ እንዲተላለፍ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function programApproveSupervisor($id)
    {
//        dd($id);
        $programtv = Tvprogram::find($id);
        $programtv->is_supervisor = '1';
        $programtv->supervisor = auth()->user()->name;
        $programtv->save();

        session()->flash('success', "ሁሉም ፕሮግራሞች እንዲተላለፉ አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }

    public function programApproveTechTv($id)
    {
        $programtv = Tvprogram::find($id);
        $programtv->is_transmit = '1';
        $programtv->technician = auth()->user()->name;
        $programtv->save();
        session()->flash('success', "ፕሮግራሙ መተላልፉን አረጋግጠሀል ፡፡  ");
        return redirect()->back();

    }
}
