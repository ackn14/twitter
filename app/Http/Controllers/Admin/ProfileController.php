<?php
//他のコントローラーファイルと同じ関数名を使用できる
namespace App\Http\Controllers\Admin;
//DBトランザクション用
use Illuminate\Support\Facades\DB;
//リクエスト用
use Illuminate\Http\Request;
//クラス継承用コントローラー
use App\Http\Controllers\Controller;
//Authメソッド？ログインの時に使う
use Illuminate\Support\Facades\Auth;

use App\Profiles;
use App\User;
//画像アップロード先をS3に指定
use Storage;

class ProfileController extends Controller
{
    
    //プロフィール画面表示用
    public function profile(Request $request){
        $user = User::find($request->id);
        $tweets = $user->twitters()->orderBy('updated_at', 'desc')->get();
        // dd($tweets);
        // dd($user->profile->twitterId);
        return view('twitter.profile', ['tweets' => $tweets,'user' => $user]);
    //
    }
    
    
    //プロフィール一覧表示用
    public function index(Request $request){

          $cond_title = $request->cond_title;
          if ($cond_title != '') {
              // 検索されたら検索結果を取得する
              $posts = User::where('name', $cond_title)->get();
          } else {
              // それ以外はすべてのユーザ情報を取得する
              $posts = User::all();
          }
        
        // 単体テスト用
        // kokokara debug
        // $posts = User::all();
        // foreach ($posts as $user) {
        //     var_dump($user->profiles);
        // }
        // return;
        // kokomade debug
        
        return view('admin.profile.index', ['cond_title' => $cond_title ,
                                                        'posts' => $posts]);
    }
    
    
    //プロフィール編集画面用
    //ここでRequestはいらなさそう
     public function edit(Request $request)
     {
        $user = Auth::user();

        if(empty($user)){
            abort(404);
        }
        return view('admin.profile.edit',['user' => $user]);
    }
     
     
     //プロフィール更新用
     public function update(Request $request)
     {
        //現在ログイン認証しているユーザの情報を取得
        $user = Auth::user();
        $profile_form = $request->all();
        
        //DBトランザクション
        // DB::beginTransanction();<=上手く機能せず
        DB::transaction(function () use ($user,$profile_form){
            //Userテーブルの更新
            $user->fill($profile_form)->save();
            //Profileテーブルに存在しない項目を削除
            unset($profile_form['name']);
            
            //Profileテーブルの更新
            $user->profile->fill($profile_form)->save();
        });
        // try{
        //     DB::commit();
        // }catch (\PDOExcepotion $e){
        //     DB::rollback();
        // }
        
        return redirect('profile');
     }
}

