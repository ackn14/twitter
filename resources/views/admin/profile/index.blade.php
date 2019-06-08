@extends('layouts.profile')
@section('title', '登録済みプロフィール一覧')

@section('content')
    <div class="container">
        
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        
        
        
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">ユーザ検索</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title"
                            value="{{ $cond_title }}"/>
                        </div>
                        
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索"/>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="10%">画像</th>
                                <th width="20%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ str_limit($post->name, 100) }}</td>
                                    <td>
                                        <div class="image">
                                            @if ($post->profile != null)
                                              @if ($post->profile->image_path)
                                                  <img src="{{ ($post->profile->image_path) }}">
                                              @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                      @if ($post->profile != null)
                                        {{ str_limit($post->profile->introduction, 250) }}</td>
                                      @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
        
    </div>
@endsection