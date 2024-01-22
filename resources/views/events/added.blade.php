<!-- resources/views/events/added.blade.php -->
@extends('layouts.app') <!-- もしレイアウトを使用する場合 -->

@section('content')
    <h1>ミッションが正常に追加されました</h1>
    <p>
        <strong>ミッションID:</strong> {{ $event->id }}<br>
        <strong>ミッションタイトル:</strong> {{ $event->event_title }}<br>
        <strong>ミッション本文:</strong> {{ $event->event_sentence }}<br>
        <strong>達成条件:</strong> {{ $event->conditions }}<br>
        <strong>ミッションクラス:</strong> {{ $event->event_class ? '通常' : '緊急' }}<br>
        <strong>報酬金:</strong> {{ $event->reward }}<br>
        <!-- <strong>作成日:</strong> {{ $event->created_at }}<br>
        <strong>更新日:</strong> {{ $event->updated_at }}<br> -->
    </p>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
@endsection
