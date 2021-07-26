<?php

namespace App\Http\Controllers\Fb;

use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function feedbackCreate()
    {
//        if (auth()->user()->role_id == '8' || auth()->user()->role_id == '7') {


        $feedback = Feedback::all();
//        $ken = ProgramKen::all();
//        $programmeleyaid = Fmmelaya::all();
        $feddate = $feedback->sortByDesc('today_date')->pluck('today_date')->unique();
        $fedken = $feedback->sortByDesc('program_ken')->pluck('program_ken')->unique();
        $feedcategory = $feedback->sortByDesc('feedback_category')->pluck('feedback_category')->unique();
        $fedmeleya = $feedback->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();


        return view('feedback.feedback', compact('feedback', 'fedmeleya', 'feddate', 'fedken', 'feedcategory'));

//        return view('feedback.feedback')
//                ->with('ken', ProgramKen::all())
//                ->with('feedback',Feedback::all())
//                ->with('feedbackAll',Feedback::all())
//                ->with('program', Program::all())
//                ->with('programmeleyaid', ProgramMeleya::all());
//        }

//        session()->flash('error', "You are not allowed to access this page  ፡፡  ");
//        return redirect()->back();
    }

    public function feedbackSave(Request $request)
    {


        $this->validate($request, [
            'today_date' => ['required'],
            'program_ken' => ['required'],
            'program_mitelalefbet' => ['required'],
            'feedback_category' => ['required'],
            'feedback' => ['required', 'string', 'min:5']
        ]);

//        dd($request->all());

        if (auth()->user()->role_id == '8' || auth()->user()->role_id == '7') {
            Feedback::create([
                'user_id' => auth()->user()->id,
                'today_date' => $request->today_date,
                'program_ken' => $request->program_ken,
                'feedback_category' => $request->feedback_category,
                'program_mitelalefbet' => $request->program_mitelalefbet,
                'feedback' => $request->feedback
            ]);
            session()->flash('success', "በስርጭት ወቅት ያጋጠሙ ችግሮች-መስተካከል ያለባችውን መዝግበሀል  ፡፡  ");
            return redirect(route('home'));

        }

        session()->flash('error', "You are not allowed to access this page  ፡፡  ");
        return redirect()->back();

    }

    public function feedBackList()
    {
        $feedback = Feedback::all();
//        $ken = ProgramKen::all();
//        $programmeleyaid = Fmmelaya::all();
        $feddate = $feedback->sortByDesc('today_date')->pluck('today_date')->unique();
        $fedken = $feedback->sortByDesc('program_ken')->pluck('program_ken')->unique();
        $feedcategory = $feedback->sortByDesc('feedback_category')->pluck('feedback_category')->unique();
        $fedmeleya = $feedback->sortBy('program_mitelalefbet')->pluck('program_mitelalefbet')->unique();
//        $proken = $ken->sortBy('id')->pluck('name')->unique();

        return view('feedback.feedback', compact('feedback', 'fedmeleya', 'feddate', 'fedken', 'feedcategory'));


    }

    public function feedbackDelete($id)
    {
        $feedback = Feedback::findorfail($id);
        $feedback->delete();
        session()->flash('error', "የተሰጠውን  አስተያየት ሰርዘሀል ፡፡  ");
//        return redirect(route('program-list-by-date-fm', $programfm->program_ken_id));
        return redirect()->back();
    }

}
