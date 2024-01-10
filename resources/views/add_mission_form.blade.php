<!-- resources/views/add_mission_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>ミッションを追加</h1>

        <form action="{{ route('add-mission') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="mission_title" class="form-label">ミッションタイトル:</label>
                <input type="text" class="form-control" name="mission_title" id="mission_title" required>
            </div>

            <div class="mb-3">
                <label for="mission_sentence" class="form-label">ミッション本文:</label>
                <textarea class="form-control" name="mission_sentence" id="mission_sentence" style="resize: none;" required></textarea>

            </div>

            <div class="mb-3">
                <label for="conditions" class="form-label">達成条件:</label>
                <input type="text" class="form-control" name="conditions" id="conditions" required>
            </div>

            <div class="mb-3">
                <label for="mission_class" class="form-label">ミッションクラス:</label>
                <select class="form-select" name="mission_class" id="mission_class" required>
                    <option value="通常">通常</option>
                    <option value="緊急">緊急</option>
                </select>
            </div>

            <div class="mb-3">
                <div class="input-group">
                <label for="reward" class="form-label">報酬金:</label>
                    <input type="number" class="form-control" name="reward" id="reward" min="1" max="9999" required>
                    <span class="input-group-text">万</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">ミッションを追加</button>
        </form>

        <a href="{{ route('home') }}" class="mt-3 btn btn-secondary">ホーム画面へ戻る</a>
    </div>
@endsection
