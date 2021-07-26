<?php

namespace App\Http\Controllers\Admin;

use App\Fmmastawokia;
use App\Fmmereja;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\Mastawokia;
use App\Mereja;
use App\Program;
use App\Role;
use App\Tvmastawokia;
use App\Tvprogram;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterControllerAdmin extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth'])->except('logout');
    }

    public function registerUserFormAdmin()
    {
        return view('auth.admin.register-admin')
            ->with('users', User::all())
            ->with('role', Role::all());
    }

    public function registerCreateAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);

        User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'username' => $request->username,
            'user_created_by' => auth()->user()->name,
            'password' => Hash::make($request->password),
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'ተጠቃሚ በትክክል መዝግበሀል ፡፡ ');
        return redirect()->back();

    }

    public function userEditAdmin($id)
    {
//        dd($id);
        $user_data = User::find($id);
//        dd($user_data);
        return view('auth.admin.register-admin')
            ->with('user_data', $user_data)
            ->with('role', Role::all());
    }

    public function userUpdateAdmin(Request $request, $id)
    {
        $user = User::find($id);

//        dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required',
            'user_created_by' => auth()->user()->name,
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);

        $user->name = $request->name;
        $user->user_created_by = auth()->user()->name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);

        $user->save();
        session()->flash('success', 'ተጠቃሚ በትክክል አስተካክለሀል  ፡፡ ');
        return redirect(route('register-user-admin'));
    }

    public function userDeleteAdmin($id)
    {
        $user = User::findorFail($id);


        $profm = Fmprogram::all()->where('user_id', $user->id);
        $masfm = Fmmastawokia::all()->where('user_id', $user->id);
        $merfm = Fmmereja::all()->where('user_id', $user->id);

        $pro = Program::all()->where('user_id', $user->id);
        $mer = Mereja::all()->where('user_id', $user->id);
        $mas = Mastawokia::all()->where('user_id', $user->id);

        $masTv = Tvmastawokia::all()->where('user_id', $user->id);
        $protv = Tvprogram::all()->where('user_id', $user->id);

        if ($masTv->count() > 0
            || $protv->count() > 0
            || $masfm->count() > 0
            || $profm->count() > 0
            || $merfm->count() > 0

            || $pro->count() > 0
            || $mer->count() > 0
            || $mas->count() > 0
            || $user->role_id == '8' || $user->role_id == '7') {
            session()->flash('error', 'You cannot delete the user, This user has  some number  of programs/posts ');
            return redirect(route('register-user-admin'));
        }

        if ($user->id == Auth::user()->id) {
            session()->flash('error', 'You cannot delete your account. ');
            return redirect(route('register-user-admin'));
        }

        $user->delete();
        session()->flash('success', 'The user is deleted  ');
        return redirect(route('register-user-admin'));
    }

    public function userMakeActive($id)
    {

//        dd($id);
        $user = User::find($id);

        $user->isActive = 1;
        $user->save();
        session()->flash('success', 'The user is Activated  ');
        return redirect(route('register-user-admin'));
    }

    public function userMakeInActive($id)
    {

//        dd($id);
        $user = User::find($id);

        if ($user->id == Auth::user()->id) {
            session()->flash('error', 'You cannot De Activated your account. ');
            return redirect(route('register-user-admin'));
        }



        $user->isActive = 0;
        $user->save();
        session()->flash('error', 'The user is DeActivated  ');
        return redirect(route('register-user-admin'));
    }

}
