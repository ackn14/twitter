<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Auth;

use Storage;
use App\Profiles;
use App\Twitters;
use App\User;
//日付操作ライブラリ
use Carbon\Carbon;

class TwitterController extends Controller
{
    
    //トップ画面（タイムライン）表示用メソッド
    public function index(Request $request){
        //ツイートを作った順に並び替え
        $tweets = Twitters::orderBy('updated_at', 'desc')->get();
        $user = Auth::user();
        
        // $path = Storage::disk('local')->putFile('image/','Contents');
        // $user->profile->image_path = Storage::disk('s3')->url($path);
        
        // foreach ($tweet as $tweets) {
        //     dd($tweets->user);
        // }
        // return;
        // foreach ($profile as $profiles) {
        //     dd($profiles->name);
        // }
        // return;
        // twitter/index.blade.php ファイルを渡している
        return view('twitter.index', ['tweets' => $tweets , 'user' => $user]);
    //
    }
    
    
    
    //ツイート詳細表示用メソッド
    public function show(Request $request){
        $tweet = Twitters::Where('id', $request->id)->get();
        // dd($tweet[0]->user_id);
        // if(Auth::check()){
        //     dd('ログイン済み');
        // }else{
        //     dd('未ログイン');
        // }
        return view('twitter.show', ['tweet' => $tweet[0]]);
    //
    }
}
