@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">ログイン</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! form::label('email', 'メールアドレス') !!}
                        {!! form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('password', 'パスワード') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-right">
                        {!! form::submit('ログイン', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
Updating the navbar
resources/views/commons/navbar.blade.php

<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left" href="/"><img src="{{ secure_asset("images/logo.png") }}" alt="Monolist"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                アイテムを追加
                              </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">マイページ</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout.get') }}">ログアウト</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('signup.get') }}">新規登録</a></li>
                        <li><a href="{{ route('login') }}">ログイン</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
We’ve added &d=mm to the <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle"> tag. As Gravatar’s Default Image documentation describes, adding d=... to the end of the URL lets us specify a default image if the user doesn’t have one of their own.

Updating the home page
resources/views/welcome.blade.php

@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>素敵なモノと出会う場所</h1>
                @if (!Auth::check())
                    <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">モノリストを始める</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
    テスト
@endsection