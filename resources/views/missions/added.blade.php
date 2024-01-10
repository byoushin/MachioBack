<!-- resources/views/missions/added.blade.php -->
@extends('layouts.app') <!-- もしレイアウトを使用する場合 -->

@section('content')
    <h1>ミッションが正常に追加されました</h1>
    <p>
        <strong>ミッションID:</strong> {{ $mission->id }}<br>
        <strong>ミッションタイトル:</strong> {{ $mission->mission_title }}<br>
        <strong>ミッション本文:</strong> {{ $mission->mission_sentence }}<br>
        <strong>達成条件:</strong> {{ $mission->conditions }}<br>
        <strong>ミッションクラス:</strong> {{ $mission->mission_class ? '通常' : '緊急' }}<br>
        <strong>報酬金:</strong> {{ $mission->reward }}<br>
        <!-- <strong>作成日:</strong> {{ $mission->created_at }}<br>
        <strong>更新日:</strong> {{ $mission->updated_at }}<br> -->
    </p>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
@endsection
