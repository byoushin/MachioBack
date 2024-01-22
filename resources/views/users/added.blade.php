<!-- resources/views/missions/added.blade.php -->
@extends('layouts.app') <!-- もしレイアウトを使用する場合 -->

@section('content')
    <h1>ミッションが正常に追加されました</h1>
    <p>
        <strong>ユーザ名:</strong> {{  $user->name }}<br>
        <strong>メールアドレス:</strong> {{ $user->email }}<br>
        <strong>パスワード:</strong>＊＊＊＊＊＊＊＊＊＊＊<br>

    </p>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
@endsection
