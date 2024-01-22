<!-- resources/views/notifications/added.blade.php -->
@extends('layouts.app') <!-- もしレイアウトを使用する場合 -->

@section('content')
    <h1>参加者が追加されました</h1>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
    <p>
        <strong>ユーザID:</strong> {{ $Participation->user_id }}<br>
        <strong>チームID:</strong> {{ $Participation->team_id }}<br>
    </p>
@endsection
