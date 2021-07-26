<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
class TableditController extends Controller
{
    //
    function index()
    {
        $data = DB::table('users')->get();
        return view('table_edit', compact('data'));
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $user_data = array(
                    'name' => $request->name,
                    'first_name' => $request->first_name,
//                    'last_name' => $request->last_name,
                    'gender' => $request->gender
                );
                DB::table('users')
                    ->where('id', $request->id)
                    ->update($user_data);
            }
//            if ($request->action == 'delete') {
//                DB::table('users')
//                    ->where('id', $request->id)
//                    ->delete();
//            }
            return response()->json($request);
        }
    }
}
