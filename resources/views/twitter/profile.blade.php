@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            
            <h3>プロフィール情報</h3>
            <div class="profile">
                <div class="image">
                    <img src="{{ ($user->profile->image_path) }}">
                </div>
                
                <div class="name">
                    {{ str_limit($user->name, 20)}}
                </div>
                <div class="twitterId">
                    {{ str_limit($user->profile->twitterId, 50) }}
                </div>
                <div class="introduction">
                    {{ str_limit($user->profile->introduction, 1500)}}
                </div>
                @if(Auth::check()) 
                    @if ($user->id == Auth::user()->id )
                        <a href="/admin/profile/edit?id={{ Auth::user()->id }}"
                            class="btn btn-primary">プロフィールを編集</a>
                    @endif
                @endif
            </div>
            
        </div>

        <div class="posts col-md-9">
        <!--タイムライン-->
        <h3>過去のツイート一覧</h3>
        <hr color="#c0c0c0">
    
            @if($tweets != null)
                <!--ツイート１件-->
                @foreach ($tweets as $tweet)
                
                    <div class="post">
                        <a href="/twitter/show?id={{ $tweet->id }}">
                        <div class="row">
                            <div class="text col-md-8">
                                
                                <!--アイコン-->
                                <div class="image">
                                    <a href="/profile?id={{ $tweet->id }}"></a>
                                    <img src="{{ ($tweet->user->profile->image_path) }}">
                                </div>
                                
                                <!--名前-->
                                <span class="name">
                                    {{ str_limit($tweet->user->name, 250) }}
                                </span>
                                
                                <!--ツイッターID-->
                                <span class="twitterId">
                                    {{ str_limit($tweet->user->profile->twitterId, 250) }}
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
                            @if ($tweet->image_path)
                                <div class="tweet-image col-md-4 text-right mt-4">
                                    <img src="{{ ($tweet->image_path) }}">
                                </div>
                            @endif
                            
                        </div>
                        </a>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            @else
                <p>まだ投稿がありません</p>
            @endif
        </div>
    </div>
</div>

@endsection