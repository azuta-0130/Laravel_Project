<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{

   
    //コメントを登録する
    public function exeComment(CommentRequest $request) 
    {
        //コメントのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //コメントを登録
            Comment::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            about(500);
        }
        return back();
    } 

    //コメントを削除する
    public function exeDelete($id) 
    {
        //コメントの削除
        if (empty($id)) {
            \Session::flash('err_msg', データがありません。);
            return redirect(route('show'));
        }

        try {
            //コメントを削除
            Comment::destroy($id);
        } catch(\Throwable $e) {
            about(500);
        }
        return back();
    } 

}
