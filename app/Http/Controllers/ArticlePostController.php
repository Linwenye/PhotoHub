<?php

namespace App\Http\Controllers;

use App\ArticlePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlePostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $articles = DB::table('article_posts')->get();

        return view('topic.topic',compact('articles'));
    }

    public function create($id)
    {
        $article = new ArticlePost();
        $article->user_id = $id;
        $article->title = request('title');
        $article->description = \request('description');
        $article->save();

        return redirect('/topics');
    }
}
