<!-- resources/views/add_notification_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>通知を追加</h1>

        <form action="{{ route('add-notification') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">タイトル:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="mb-3">
                <label for="sentence" class="form-label">文章:</label>
                <textarea class="form-control" name="sentence" id="sentence" style="resize: none;" required></textarea>
            </div>
            <div class="mb-3">
                <label for="send_date" class="form-label">送信日:</label>
                <!-- min 属性を使用して今日以降の日付を指定 -->
                <input type="date" class="form-control" name="send_date" id="send_date" required min="{{ date('Y-m-d') }}">
            </div>
            <button type="submit" class="btn btn-primary">通知を追加</button>
        </form>
        <a href="{{ route('home') }}" class="mt-3 btn btn-secondary">ホーム画面へ戻る</a>
    </div>
@endsection
