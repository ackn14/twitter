@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
            
            <h2>ツイート詳細</h2>
            <hr color="#c0c0c0">
        
            <!--ツイート１件-->
            <div class="post">
                <div class="row">
                    <div class="text col-md-8">
                        
                        <!--アイコン-->
                        <div class="image">
                            <a href="/profile?id={{ $tweet->user_id }}"></a>
                            <img src="{{ asset('storage/image/' . $tweet->user->profile->image_path) }}">
                        </div>
                        
                        <!--名前-->
                        <span class="name">
                            {{ str_limit($tweet->user->name, 20) }}
                        </span>
                        
                        <!--ツイッターID-->
                        <span class="twitterId">
                            {{ str_limit($tweet->user->profile->twitterId, 140) }}
                        </span>
                        
                        <!--投稿日時-->
                        <span class="date">
                            <?php //formatで日付フォーマット変更 ?>
                            {{ $tweet->updated_at->format('Y年m月d日') }}
                        </span>
                        
                        <!--ツイート本文-->
                        <p class="tweet">
                            {{ str_limit($tweet->body, 140)}}
                        </p>
                    </div>
                    
                    <!--投稿した画像-->
                    @if ($tweet->image_path != null)
                        <div class="tweet-image col-md-4 text-right mt-4">
                                <img src="{{ asset('storage/image/' . $tweet->image_path) }}">
                        </div>
                    @endif
                    
                </div>
            </div>
            <hr color="#c0c0c0">
            
            
            <!--編集と削除ボタン-->
            <div class="col-md-4 mx-auto">
                @if(Auth::check()) 
                    @if ($tweet->user_id ==  Auth::user()->id )
                    
                        <div class="col-md-4 float-left mx-auto">
                            <a href="{{ action('Admin\TwitterController@edit', ['id' => $tweet->id]) }}"
                                class="btn btn-primary">編集</a>
                        </div>
                        
                        <div class="col-md-4 float-right mx-auto">
                            <a href="{{ action('Admin\TwitterController@delete', ['id' => $tweet->id]) }}"
                                class="btn btn-primary">削除</a>
                        </div>
                        
                    @endif
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection