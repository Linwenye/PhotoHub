<?php

namespace App\Http\Controllers;

use App\AlbumTag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Album;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        if (authById($id)) {
            $albums = DB::table('albums')->where('id', $id)->get();
            $tags = array();
            foreach ($albums as $album) {
                array_push($tags, DB::table('album_tags')->where('album_id', $album->album_id)->get());
            }
            return view('user/album', compact('albums', 'tags'));
        }
        else{
            dd('You cannot access other account');
        }
    }

    public function store($id)
    {
        $album = new Album();
        $album->id = $id;
        $album->album_name = request('title');
        $album->cover_url = \request('url');
        $album->save();

        $tag_list = explode('#', request('tag'));
        foreach ($tag_list as $tag) {
            if (!empty($tag)) {
                $tag_album = new AlbumTag();
                $tag_album->album_id = $album->id;
                $tag_album->tag_name = $tag;
                $tag_album->save();
            }
        }

        return redirect('/' . $id . '/album');
    }

    public function delete($id, $album_id)
    {
        Album::destroy($album_id);
        return redirect('/' . $id . '/album');
    }
}
