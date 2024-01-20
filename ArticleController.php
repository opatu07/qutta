<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cook;



class ArticleController extends Controller
{   
    // 登録画面
    public function add()
    {
        return view('crud.add');
    }

    public function __construct()
    {
        $this->data = new Cook();
    }

    // 登録処理
    public function create(Request $request)
    {   
        $registerCooks = $this->data->insertCooks($request);
        return view('crud.add');
    }


    // 一覧処理
    public function read() {
        $datas = $this->data->findAllCooks();
        
        return view('crud.read', compact('datas'));
    }

    // 詳細画面
    public function show($id)
    {
        $data = Cook::find($id);
        
        return view('crud.show', compact('data'));
    }

    // 編集画面の表示
    public function edit($id)
    {
        $data = Cook::find($id);

        return view('crud.edit', compact('data'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $datas = Cook::find($id);
        $updateCooks = $this->data->updateCooks($request, $datas);
        return view('crud.read', compact('datas'));

    }

    //削除処理
    public function destroy($id)
    {
        $datas = $this->data->deleteCookById($id);

        return view('crud.read', compact('datas'));
    }

    // 画像登録処理
    public function store(Request $request)
    {
        //新規postを作成
        $post= new cook();

        //バリデーションルール
        $inputs = request()->validate([
            'image'=>'image'
        ]);

        //画像ファイルの保存場所指定
        if(request('image')){
            $filename=request()->file('image')->getClientOriginalName();
            $inputs['image']=request('image')->storeAs('public/storage', $filename);
        }

        // postを保存
        $post->create($inputs);

    }


}
