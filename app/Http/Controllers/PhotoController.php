<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id,$album_id){//TODO two ids
        $photos = DB::table('photo_posts')->where([['album_id','=',$album_id],['id','=',$id]])->get();
        $tags = array();
        foreach ($photos as $photo) {
            array_push($tags, DB::table('photo_tags')->where('photo_id', $photo->photo_id)->get());
        }
        return view('user/photo',compact('photos','tags'));
    }

    public function delete($id){

    }
}
