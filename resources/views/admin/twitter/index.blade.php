@extends('layouts.profile')
@section('title', '投稿されたツイート一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ツイート一覧</h2>
        </div>
        
        <div class="row">
            
            <div class="col-md-8">
                <form action="{{ action('Admin\TwitterController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">ツイート検索</label>
                        
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
                                <th width="20%">ツイート</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->user->id }}</th>
                                    <td>{{ str_limit($post->user->name, 100) }}</td>
                                    <td>{{ str_limit($post->body, 500) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection