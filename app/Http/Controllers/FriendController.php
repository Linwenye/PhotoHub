<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id)
    {
        if (authById($id)) {
            $users = DB::table('friends')->join('users', 'friends.friend_id', '=', 'users.id')->where('friends.user_id', $id)->get();
            return view('friend.friend', compact('users'));
        } else {
            dd('You have no access');
        }
    }

    public function add($user,$friend_id){
        $friend = new Friend();
        $friend->user_id = $user;
        $friend->friend_id = $friend_id;
        $friend->save();
        return redirect('/'.$user.'/friends');

    }
    public function delete($user, $friend_id)
    {
        DB::table('friends')->where([
            ['user_id', '=', $user],
            ['friend_id', '=', $friend_id],
        ])->delete();

        return redirect('/'.$user.'/friends');
    }

    public function search($id){
        $search_name = request('friend');
        $users = DB::table('friends')->join('users', 'friends.friend_id', '=', 'users.id')->where('friends.user_id', $id)->get();
        $friends = DB::table('users')->where('name','like',$search_name.'%')->get();
        return view('friend.result',compact('users','friends'));
    }
}
