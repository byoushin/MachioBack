<!-- resources/views/add_mission_form.blade.php -->

@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>ユーザを追加</h1>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ユーザ名:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">パスワード:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">パスワード確認:</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">ユーザを追加</button>
        </form>

        <a href="{{ route('home') }}" class="mt-3 btn btn-secondary">ホーム画面へ戻る</a>
    </div>
@endsection