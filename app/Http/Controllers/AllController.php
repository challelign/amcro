<?php

namespace App\Http\Controllers;

use App\Mastawokia;
use App\Mereja;
use App\Program;
use App\ProgramKen;
use App\ProgramMeleya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('logout');
//        $this->middleware('guest')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function programListByDate($id)
    {
//       dd($id); is_artayi
        $ken = ProgramKen::find($id);


        return view('programs.program-list-by-date')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())
            //            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());

    }

    public function programListByDateTewat($id)
    {

        $ken = ProgramKen::find($id);
        return view('programs.inc.all-tewat')
            ->with('ken', $ken)
//            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
    }


    public function updatePosition(Request $request)
    {
        if(Auth::user()->role_id ==  9 || Auth::user()->role_id ==  10){
            $mastawokia = Mastawokia::all();
            foreach ($mastawokia as $mast) {
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
        }
        else{
            session()->flash('error', "የማስታወቂያ ቅደም ተከተለል ማስተካከል አትችልም ፡፡  ");
            return redirect()->back();
        }

    }

    public function programListByDateTewatPrint($id)
    {

        $ken = ProgramKen::find($id);
        return view('programs.print.p-tewat')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            //            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function programListByDateKenPrint($id)
    {
        $ken = ProgramKen::find($id);
        return view('programs.print.p-ken')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            //            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function programListByDateMataPrint($id)
    {
        $ken = ProgramKen::find($id);
        return view('programs.print.p-mata')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

//            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
    }

    public function programListByDateLelitPrint($id)
    {
        $ken = ProgramKen::find($id);
        return view('programs.print.p-lelit')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            //            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
    }


    public function programListByDateKen($id)
    {

        $ken = ProgramKen::find($id);
        return view('programs.inc.all-ken')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            //            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
//
    }

    public function programListByDateMata($id)
    {

        $ken = ProgramKen::find($id);
        return view('programs.inc.all-mata')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

            //            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
//
    }

    public function programListByDateLelit($id)
    {

        $ken = ProgramKen::find($id);
        return view('programs.inc.all-lelit')
            ->with('ken', $ken)
            ->with('mastawokia', Mastawokia::orderBy('position')->where('program_ken_id', $id)->get())

//            ->with('mastawokia', Mastawokia::all()->where('program_ken_id', $id))
            ->with('mereja', Mereja::all())
            ->with('program', Program::all()->where('program_ken_id', $id))
            ->with('programmeleyaid', ProgramMeleya::all());
//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
