<?php

namespace App\Http\Controllers;

use App\PhotoPost;
use App\PhotoTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhotoPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $albums = DB::table('albums')->where('id', $id)->get();
        return view('user.photopost',compact('albums'));
    }

    public function postUpload(Request $request, $id)
    {
        request()->validate([
            'file_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . request()->file_upload->getClientOriginalExtension();
//        $destinate = getAbsUserPath(Auth::user()->email);
        $destinate = public_path('images') . '/usr/' . (Auth::user()->email);
        request()->file_upload->move($destinate, $imageName);

        $photoPost = new PhotoPost();
        $photoPost->id = $id;
        $photoPost->album_id = request('album_id');
        $photoPost->url = getRelativeUserPath(Auth::user()->email) . '/' . $imageName;
        $photoPost->description = request('description');
        $photoPost->title = request('title');
        $photoPost->save();
        $tag_list = explode('#', request('tag'));
        if (count($tag_list) >= 1) {
            foreach ($tag_list as $tag) {
                if (!empty($tag)) {
                    $tag_photo = new PhotoTag();
                    $tag_photo->photo_id = $photoPost->id;
                    $tag_photo->tag_name = $tag;
                    $tag_photo->save();
                }
            }
        }
        return redirect('/home');

    }

}