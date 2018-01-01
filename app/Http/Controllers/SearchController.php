<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function show(){
        return view('search/search');
    }

    public function search(){
        $search_content = request('q');
//        dd($search_content);
        $photo_posts = DB::table('photo_posts')->where('title','like',$search_content.'%')->get();
        return view('search.result',compact('photo_posts'));

    }
}
