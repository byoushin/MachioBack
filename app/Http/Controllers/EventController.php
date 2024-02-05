<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Participation;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class EventController extends Controller{
    // イベントを追加する処理
    public function add_event(Request $request) {
        // Requestの値を変数に格納
        $event_name = $request->input('event_name');
        $introduction = $request->input('introduction');
        $event_date = $request->input('event_date');
        
        // データベースに保存
        Event::create([
            'event_name' => $event_name,
            'introduction' => $introduction,
            'event_date' => $event_date,
        ]);
        // 成功メッセージを返答
        return response()->json(['message' => 'Event added successfully'], 200);
            // Web からアクセスされる場合はビューを返す
        return view('events.added', ['event' => $event]);
    }

    // イベントコードとユーザの結び付け
    public function participation(Request $request) {
    // Requestの値を変数に格納
    $event_id = $request->input('event_id');
    $user_id = $request->input('user_id');

    $participation = Participation::where('event_id', $event_id)
        ->where('user_id', $user_id)
        ->first();

    if (!$participation) {
            // 新規登録処理
            $new_participation = new Participation();
            $new_participation->event_id = $event_id;
            $new_participation->user_id = $user_id;
            $new_participation->team_id = 1;
            $new_participation->classification = 0;
            $new_participation->score = 2434;
            $new_participation->rank = 0;
            $new_participation->latitude = 0;
            $new_participation->longitude = 0;
            $new_participation->save();
    
            // 新規登録したデータを返す
            // return response()->json($newnew_participation, 200);
            $teamParticipation = Team::where('team_id', $new_participation->team_id)
                ->first();
        
            // 既存のデータが見つかった場合はそのまま返す
            return response()->json(['teamParticipation' => $teamParticipation, 'participation' => $new_participation], 200);
        }
    
        // ここで $participation の値を取得
        $teamParticipation = Team::where('team_id', $participation->team_id)
            ->first();
    
        // 既存のデータが見つかった場合はそのまま返す
        return response()->json(['teamParticipation' => $teamParticipation, 'participation' => $participation], 200);
    }
    // イベントの参加者を登録する処理
    public function add_participation(Request $request) {
        // Requestの値を変数に格納
        $event_id = $request->input('event_id');
        $team_id = $request->input('team_id');
        $user_id = $request->input('user_id');
        $classification = $request->input('classification');
        $score = $request->input('score');
        $rank = $request->input('rank');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // データベースに保存
        $Participation = Participation::create([
            'event_id' => $event_id,
            'team_id' => $team_id,
            'user_id' => $user_id,
            'classification' => 0,
            'score' => 0,
            'rank' => 0,
            'latitude' => 0,
            'longitude' => 0,
        ]);
        return view('participations.added', ['Participation' => $Participation]);
        // 成功メッセージを返答
        return response()->json(['message' => 'Event added successfully'], 200);
    }
    public function add_participation_form($event_id)
    {
        // 通知を追加するためのフォームを表示
        // eventsテーブルの全てのデータを取得
        $users = User::all();
        
        $teams = Team::all();
        // ビューにデータを渡して表示
        return view('add_participation_form',['users' => $users,'teams' =>$teams,'event_id' => $event_id]);
    }
}
