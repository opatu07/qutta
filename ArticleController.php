<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;



class ArticleController extends Controller
{   
    // 画面にリダイレクト 必要性がわからない
    public function add()
    {
        return view('crud.add');
    }

    // 登録処理
    public function create(Request $request)
    {
        $article = new Article;
        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return redirect('/post');
    }

    // 一覧処理
    public function read(Request $request) {
        $data = article::all();

        return view('crud.read', compact('data'));
    }

    // 詳細画面
    public function show($id)
    {
        $data = Article::find($id);
        
        
        return view('crud.show', compact('data'));
    }

    // 編集処理
    public function edit($id)
    {
        $data = Article::find($id);

        return view('crud.edit', compact('data'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $data = Article::find($id);
        $updateArticle = $this->data->updateArticle($request, $data);
        return redirect()->route('crud.read');
    }

}
