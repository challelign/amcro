<?php

namespace App\Http\Controllers\Pro;

use App\Fmmastawokia;
use App\Fmmereja;
use App\Fmprogram;
use App\Http\Controllers\Controller;
use App\Mastawokia;
use App\Role;
use App\Tvmastawokia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterControllerPro extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth'])->except('logout');
    }
    public function registerUserFormPro()
    {
        if (Auth::user()->id == 9) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        return view('auth.pro.register-pro')
            ->with('users', User::all())
            ->with('role', Role::all());
    }

    public function registerCreatePro(Request $request)
    {
        if (Auth::user()->id == 9) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'username' => ['required', 'string',  'unique:users'],
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
    public function userEditPro($id)
    {
        if (Auth::user()->id == 9) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
//        dd($id);
        $user_data = User::find($id);
//        dd($user_data);
        return view('auth.pro.register-pro')
            ->with('user_data', $user_data)
            ->with('role', Role::all());
    }

    public function userUpdatePro(Request $request, $id)
    {
        if (Auth::user()->id == 9) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        $user = User::find($id);

//        dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required',
            'user_created_by' => auth()->user()->name,
            'username' => ['required', 'string', 'max:255'  ,'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);

        $user->name = $request->name;
        $user->user_created_by = auth()->user()->name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);

        $user->save();
        session()->flash('success', 'ተጠቃሚ በትክክል አስተካክለሀል  ፡፡ ');
        return redirect(route('register-user-pro'));
    }

    public function userDeletePro($id)
    {
        if (Auth::user()->id == 9) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        $user = User::findorFail($id);
        $masTv = Tvmastawokia::all()->where('user_id', $user->id);
        $masfm = Fmmastawokia::all()->where('user_id', $user->id);
        $mas = Mastawokia::all()->where('user_id', $user->id);

        if ($masTv->count() > 0 || $masfm->count() > 0 || $mas->count() > 0 || $user->role_id == '8') {
            session()->flash('error', 'You cannot delete the user, This user has  some number  of programs/posts ');
            return redirect(route('register-user-pro'));
        }

        if ($user->id == Auth::user()->id) {
            session()->flash('error', 'You cannot delete your account. ');
            return redirect(route('register-user-pro'));
        }

        $user->delete();
        session()->flash('success', 'The user is deleted  ');
        return redirect(route('register-user-pro'));
    }

}
