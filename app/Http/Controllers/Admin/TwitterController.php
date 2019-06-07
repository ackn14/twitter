<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

//画像アップロード先をS3に指定
use Storage;

use App\Twitters;
use App\User;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class TwitterController extends Controller
{
    //
    public function create(Request $request){
        //
        $this->validate($request,Twitters::$rules);
        
        //$twitterにtwittersテーブルのカラム(値は空白)を代入
        $twitter = new Twitters;
        $form = $request->all();
        
      // フォームから画像が送信されてきたら、保存して、$twitter->image_path に画像のパスを保存する
        if(isset($form['image'])){
            // dd($form['image']);
            //↓↓画像のアップロード先がローカル環境の場合↓↓
            // $path = $request->file('image')->store('public/image');
            // //画像が保存されてるパス(ここではpublic/image)を保存
            // $twitter->image_path = basename($path);
            //↑↑画像のアップロード先がローカル環境の場合↑↑
            // dd(Storage::disk('s3'));
            //画像のアップロード先がS3の場合
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $twitter->image_path = Storage::disk('s3')->url($path);
            // dd(Storage);
        } else {
            $twitter->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        // dd($twitter->image_path);
        //UserのidをTwittersのuser_idに代入
        $twitter->user_id = Auth::id();
        
      // データベースに保存する
        $twitter->fill($form);
        $twitter->save();
        
        return redirect('/');
    }
    
    
    
    //ツイート一覧表示用
    public function index(Request $request){

          $cond_title = $request->cond_title;
          if ($cond_title != '') {
              // 検索されたら検索結果を取得する
              $posts = Twitters::where('body', $cond_title)->get();
          } else {
              // それ以外はすべてのユーザのツイートを取得する
              $posts = Twitters::all();
          }
        
        // kokokara debug
        // $posts = User::all();
        // foreach ($posts as $user) {
        //     var_dump($user->profiles);
        // }
        // return;
        // kokomade debug
        
        return view('admin.twitter.index', ['cond_title' => $cond_title ,
                                                        'posts' => $posts]);
    }
    
    
    public function edit(Request $request)
    {
        //findは検索
        $tweet = Twitters::find($request->id);
        
        if(empty($tweet)){
            abort(404);
        }
        
        return view('admin.twitter.edit', ['twitter_form' => $tweet]);
    }
    
    
    
    public function update(Request $request)
    {
        $tweet = Twitters::find($request->id);
        // dd($tweet);
        //クライアント(chrome等のWebブラウザ)からサーバにリクエスト
        //POSTメソッドにより、全データを連想配列で取得
        $form = $request->all();
        
        //removeアクション(画像削除リクエスト)があるか検証
        //ある => 削除  ,  ない &  =>
        if($request->remove == 'true'){
            $form['image_path'] = null;
        } elseif($request->file('image')){
            
            //↓↓画像のアップロード先がローカル環境の場合↓↓
            // $path = $request->file('image')->store('public/image');
            // $form['image_path'] = basename($path);
            //↑↑画像のアップロード先がローカル環境の場合↑↑
            
            //画像のアップロード先がS3の場合
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $tweet->image_path = Storage::disk('s3')->url($path);
            
        } else {
            $form['image_path'] = $tweet->image_path;
        }        
        
        //更新に不要な項目を削除
        unset($form['_token']);
        unset($form['image']);        
        unset($form['remove']);
        
        //Twittersモデルの更新
        $tweet->fill($form)->save();
        
        //ツイート詳細画面にリダイレクト
        return redirect('/');
    }



    public function delete(Request $request){
        $twitter = Twitters::find($request->id);
        
        $twitter->delete();
        return redirect('/');
    }

    
}
