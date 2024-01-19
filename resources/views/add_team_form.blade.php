<!-- resources/views/add_mission_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>チームを追加</h1>

        <form action="{{ route('add_team') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="leader_id" class="form-label">リーダーID:</label>
                <select class="form-select" name="leader_id" id="leader_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->id }}:{{ $user->name }}</option>
                    @endforeach
                </select>
                <!-- <input type="text" class="form-control" name="leader_id" id="leader_id" required> -->
            </div>

            <div class="mb-3">
                <label for="team_name" class="form-label">チーム名:</label>
                <textarea class="form-control" name="team_name" id="team_name" style="resize: none;" required></textarea>

            </div>


            <button type="submit" class="btn btn-primary">チームを追加</button>
        </form>

        <a href="{{ route('home') }}" class="mt-3 btn btn-secondary">ホーム画面へ戻る</a>
    </div>
@endsection
