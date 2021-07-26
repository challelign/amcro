<?php

namespace App\Http\Controllers;

use App\Mastawokia;
use App\Mereja;
use App\Program;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerUserForm()
    {
        if (auth()->user()->role->id == 1) {
            return view('auth.register')
                ->with('users', User::all())
                ->with('role', Role::all());
        }
        session()->flash('error', 'You are not allowed to access this page. ');
        return redirect(route('home'));
    }

    public function userEdit($id)
    {
//        dd($id);
        $user_data = User::find($id);
        if (auth()->user()->role->id == 2) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
//        dd($user_data);
        return view('auth.register')
            ->with('user_data', $user_data)
            ->with('role', Role::all());
    }

    public function registerCreate(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'user_created_by' => auth()->user()->name,
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);
        if (auth()->user()->role->id == 2) {
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

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        if (auth()->user()->role->id == 2) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
//        dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required',
            'user_created_by' => auth()->user()->name,
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],

        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->user_created_by = auth()->user()->name;
        $user->password = Hash::make($request->password);

        $user->save();
        session()->flash('success', 'ተጠቃሚ በትክክል አስተካክለሀል  ፡፡ ');
        return redirect(route('register-user'));
    }

    public function userDelete($id)
    {
        $user = User::findorFail($id);
        if (auth()->user()->role->id == 2) {
            session()->flash('error', 'You are not allowed to access this page. ');
            return redirect(route('home'));
        }
//        dd($pro = Program::all()->where('user_id', $user->id));
        $pro = Program::all()->where('user_id', $user->id);
        $mas = Mastawokia::all()->where('user_id', $user->id);
        $mer = Mereja::all()->where('user_id', $user->id);

//        dd($user->is_artayi == 1);
//        dd($mas->count());
        if ($pro->count() > 0 || $mas->count() > 0 || $mer->count() > 0 || $user->role_id == '8') {
            session()->flash('error', 'You cannot delete the user, This user has  some number  of programs/posts ');
            return redirect(route('register-user'));
        }
//        if ($mas->count() > 0 ) {
//            session()->flash('error', 'You cannot delete the user, This user has   ' . $mas->count() . ' number  of mastawokias ');
//            return redirect(route('register-user'));
//        }
//        if ($mer->count() > 0) {
//            session()->flash('error', 'You cannot delete the user, This user has   ' . $mer->count() . ' number  of merejas ');
//            return redirect(route('register-user'));
//        }


        if ($user->id == Auth::user()->id) {
            session()->flash('error', 'You cannot delete your account. ');
            return redirect(route('register-user'));
        }

        $user->delete();
        session()->flash('success', 'The user is deleted  ');
        return redirect(route('register-user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        return view('auth.change-password')
            ->with('users', User::all())
            ->with('role', Role::all());
    }

    public function changePasswordUpdate(Request $request)
    {

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'Your Old password does not match to our database.');
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'The new password cannot be the same with Your Current password .');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:4|confirmed'
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        session()->flash('success', 'Password Changed Successfully.');
        return redirect(route('home'));

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
