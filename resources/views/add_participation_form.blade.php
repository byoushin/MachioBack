<!-- resources/views/add_mission_form.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <h1>参加者を追加</h1>

        <form action="{{ route('add_participation') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">ユーザID:</label>
                <select class="form-select" name="user_id" id="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->id }}:{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="team_id" class="form-label">チームID:</label>
                <select class="form-select" name="team_id" id="team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->team_id }}">{{ $team->team_id }}:{{ $team->team_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="hidden" class="form-control" name="event_id" id="conditions" value="{{ $event_id }}" required>
            </div>

            <!-- classification に関する部分を適切に修正すること -->

            <button type="submit" class="btn btn-primary">参加者を追加</button>
        </form>

        <a href="{{ route('home') }}" class="mt-3 btn btn-secondary">ホーム画面へ戻る</a>
    </div>
@endsection
