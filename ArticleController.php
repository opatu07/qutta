<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;



class ArticleController extends Controller
{
    public function add()
    {
        return view('/crud.add');
    }

    public function create(Request $request)
    {
        $article = new Article;
        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return redirect('/post');
    }

    public function read(Request $request) {
        $data = article::all();

        return view('crud/read')->with(['data' => $data]);
    }

    public function update(Request $request)
    {

    }

    public function destory(Request $request)
    {
        
    }
}
