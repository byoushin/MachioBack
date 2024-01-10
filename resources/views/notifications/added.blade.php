<!-- resources/views/notifications/added.blade.php -->
@extends('layouts.app') <!-- もしレイアウトを使用する場合 -->

@section('content')
    <h1>通知が正常に追加されました</h1>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
    <p>
        <strong>通知ID:</strong> {{ $notification->notification_id }}<br>
        <strong>タイトル:</strong> {{ $notification->title }}<br>
        <strong>文章:</strong> {{ $notification->sentence }}<br>
        <strong>送信日:</strong> {{ $notification->send_date }}<br>
        <!-- <strong>作成日:</strong> {{ $notification->created_at }}<br>
        <strong>更新日:</strong> {{ $notification->updated_at }}<br> -->
    </p>
@endsection
