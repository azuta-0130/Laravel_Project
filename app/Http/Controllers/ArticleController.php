<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller //LaravelのControllerをArticleControllerに継承している
{

    //ニュース一覧を表示する
    //引数無し
    //returnはview

    public function index()
    {
    //resoucesにarticlesディレクトリがあればその中身を開き
    //indexがつくファイルがあれば返す
    $articles = Article::all();

    return view('articles.index', ['articles' => $articles]); 
    }

    //ニュース詳細を表示する
    //引数 @param int $id
    //@return view

    public function showDetail($id)
    {

    $article = Article::find($id);
    $comments = Comment::all();

    return view('comments.detail', ['article' => $article,'comments' => $comments]); 
    }


    //ニュースを登録する
    public function exeStore(ArticleRequest $request) 
    {
        //ニュース記事のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //ニュース記事を登録
            Article::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            about(500);
        }

        \Session::flash('err_msg','投稿しました');
        return redirect(route('Articles'));
    }

}


