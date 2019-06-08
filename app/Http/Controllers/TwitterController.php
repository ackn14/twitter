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
    //トップ画面
    public function index()
    {
        $tweets = Twitters::orderBy('updated_at', 'desc')->get();
        $user = Auth::user();

        return view('twitter.index', ['tweets' => $tweets , 'user' => $user]);
    }
    
    
    
    //ツイート詳細画面
    public function show(Request $request)
    {
        $tweet = Twitters::Where('id', $request->id)->get();
        
        return view('twitter.show', ['tweet' => $tweet[0]]);
    }
    
    
    //プロフィール画面
    public function profile(Request $request)
    {
        $user = User::find($request->id);
        $tweets = $user->twitters()->orderBy('updated_at', 'desc')->get();

        return view('twitter.profile', ['tweets' => $tweets,'user' => $user]);
    }
}
