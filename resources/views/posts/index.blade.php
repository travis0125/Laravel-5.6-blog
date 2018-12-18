@extends('layouts.app')

@section('title','所有文章')

@section('content')
    <div class="row">
        <div class="col-xs-8">
            <h4>
                @if(Auth::check())
                    <div class="pull-right">
                        <a class="btn btn-xs btn-default" href="{{ route('posts.create') }}" style="margin-left: 20px;">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span style="padding-left: 5px;">新增文章</span>
                        </a>
                    </div>
                @endif
                @if(isset($type))
                    分類：{{ $type->name }}
                    @if(Auth::check())
                        <div class="pull-right">
                            <form method="POST" action="{{ route('types.destroy', ['type'=>$type->id]) }}">
                                <span style="margin-left: 10px;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span style="padding-left: 5px;">刪除分類</span>
                                    </button>
                                </span>
                            </form>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-xs btn-primary" href="{{ route('types.edit', ['type'=>$type->id]) }}" style="margin-left: 10px;">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span style="padding-left: 5px;">編輯分類</span>
                            </a>
                        </div>
                    @endif
                @elseif(isset($keyword))
                    搜尋：{{ $keyword }}
                @else
                    所有文章
                @endif
            </h4>
            <hr />
            @if(count($posts) == 0)
                <p class="text-center">
                    沒有任何文章
                </p>
            @endif
            @foreach ($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container-fluid" style="padding:0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 style="margin-top:0;">{{ $post->title }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    @if($post->postType!=null)
                                        <span class="badge" style="margin-left:10px;">{{ $post->postType->name }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 text-right">
                                    {{ $post->created_at->toDateString() }}
                                </div>
                            </div>
                            <hr style="margin:10px 0;" />
                            <div class="row">
                                <div class="col-md-12" style="height:100px;overflow:hidden;">
                                    {{ $post->content }}
                                </div>  
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-8">
                                    @if(Auth::check())
                                        <form method="POST" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
                                            <span style="padding-left: 10px;">
                                                <a class="btn btn-xs btn-primary" href="{{ route('posts.edit', ['post'=>$post->id]) }}">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                    <span style="padding-left: 5px;">編輯文章</span>
                                                </a>
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                    <span style="padding-left: 5px;">刪除文章</span>
                                                </button>
                                            </span>
                                        </form>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('posts.show', ['post'=>$post->id]) }}" class="pull-right">繼續閱讀...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xs-4">
            <div class="list-group">
                <a href="{{ route('posts.index') }}" class="list-group-item {{ (isset($type))?'':'active' }}">全部分類</a>
                @foreach ($post_types as $post_type)
                    <a href="{{ route('types.show', ['type'=>$post_type->id]) }}" class="list-group-item {{ (isset($type))?(($type->id == $post_type->id)?'active':''):'' }}">
                        {{ $post_type->name }}
                    </a>
                @endforeach
                @if(Auth::check())
                    <a href="{{ route('types.create') }}" class="list-group-item">建立新分類</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            @if(isset($keyword))
                {{ $posts->appends(['keyword' => $keyword])->render() }}
            @else
                {{ $posts->render() }}
            @endif
        </div>
    </div>
@endsection