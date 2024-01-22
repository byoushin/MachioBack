<!-- resources/views/teams/added.blade.php -->
@extends('layouts.app') <!-- もしレイアウトを使用する場合 -->

@section('content')
    <h1>チームが正常に追加されました</h1>
    <p>
        <strong>チームID:</strong>{{ $team->team_id }} <br>
        <strong>チーム名:</strong> {{ $team->team_name }}<br>
    </p>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
@endsection
