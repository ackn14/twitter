@extends('layouts.front')

@section('content')
<!--ツイート投稿フォーム-->
<div class="container">
    <div class="row">
        
            <div class="col-md-3">
                <h3>プロフィール情報</h3>
                @if(Auth::check()) 
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
                                @if ($user->id == Auth::user()->id )
                                    <a href="/admin/profile/edit?id={{ Auth::user()->id }}"
                                        class="btn btn-primary">プロフィールを編集</a>
                                @endif
                        </div>
                @else
                    <div>
                        <p>まだログインしていません</p>
                    </div>
                @endif
            </div>
            
            
            
            <div class="col-md-9 mx-auto">
                <h3>ツイート投稿フォーム</h3>
                <hr color="#c0c0c0">
                <form action="{{action('Admin\TwitterController@create')}}"method="post"enctype="multipart/form-data" >
                    
                    @if(count($errors)>0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
    
                    <div class="form-group row">
                        <label class="col-md-2" for="body">ツイート文章</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像を追加</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="送信">
                </form>


                <div class="posts col-md-11 mx-auto mt-3">
                    <h3 class="mt-md-3 mx-auto">タイムライン</h3>
                    <hr color="#c0c0c0">
                
                    <!--ツイート１件-->
                    @foreach($tweets as $tweet)
                    
                        <div class="post">
                            <div class="row">
                                
                                <div class="text col-md-8">
                                    
                                    <!--アイコン-->
                                    <a href="/twitter/show?id={{ $tweet->id }}">
                                    <div class="image">
                                        <a href=""></a>
                                        <img src="{{ asset('storage/image/' . $tweet->user->profile->image_path) }}">
                                    </div>
                                    </a>
                                    
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
                                @if ($tweet->image_path != null)
                                    <div class="tweet-image col-md-4 text-right mt-4">
                                            <img src="{{ ( $tweet->image_path) }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr color="#c0c0c0">
                        @endforeach
                    </div>
            </div>
    </div>
</div>
@endsection