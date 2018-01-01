<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
        if (Auth::user()->email=='419766878@qq.com'){
            $users = DB::table('users')->get();

            return view('admin',compact('users'));
        }
        else{
            dd('sorry,you are not admin');
        }
    }

    public function destroy($id){
        User::destroy($id);
        return redirect('/admin');
    }
}
