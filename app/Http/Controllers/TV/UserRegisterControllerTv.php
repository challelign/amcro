<?php

namespace App\Http\Controllers\Tv;

use App\Http\Controllers\Controller;
use App\Role;
use App\Tvprogram;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterControllerTv extends Controller
{
    public function registerUserFormTv()
    {
        if (auth()->user()->role->id == 4) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        return view('auth.tv.register-tv')
            ->with('users', User::all())
            ->with('role', Role::all());
    }


    public function registerCreateTv(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);
        if (auth()->user()->role->id == 4) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
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

    public function userEditTv($id)
    {
//        dd($id);
        $user_data = User::find($id);
//        dd($user_data);
        if (auth()->user()->role->id == 4) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        return view('auth.tv.register-tv')
            ->with('user_data', $user_data)
            ->with('role', Role::all());
    }

    public function userUpdateTv(Request $request, $id)
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
        if (auth()->user()->role->id == 4) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        $user->name = $request->name;
        $user->user_created_by = auth()->user()->name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);

        $user->save();
        session()->flash('success', 'ተጠቃሚ በትክክል አስተካክለሀል  ፡፡ ');
        return redirect(route('register-user-tv'));
    }

    public function userDeleteTv($id)
    {
        $user = User::findorFail($id);
//        $masfm = Fmmastawokia::all()->where('user_id', $user->id);
        $protv = Tvprogram::all()->where('user_id', $user->id);
        if (auth()->user()->role->id == 4) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
        if ($protv->count() > 0 || $user->role_id == '7') {
            session()->flash('error', 'You cannot delete the user, This user has  some number  of programs/posts ');
            return redirect(route('register-user-tv'));
        }

        if ($user->id == Auth::user()->id) {
            session()->flash('error', 'You cannot delete your account. ');
            return redirect(route('register-user-tv'));
        }

        $user->delete();
        session()->flash('success', 'The user is deleted  ');
        return redirect(route('register-user-tv'));
    }
}
