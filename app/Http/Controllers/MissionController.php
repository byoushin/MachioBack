<?php

namespace App\Http\Controllers;
use App\Models\Missions;
use App\Models\Mission_participation;
use App\Models\Mission_event;
use Illuminate\Http\Request;

class MissionController extends Controller{
    // ミッションを追加する処理
    public function add_missions(Request $request) {
        // Requestから送られた情報を変数に格納
        $mission_title = $request->input('mission_title');
        $mission_sentence = $request->input('mission_sentence');
        $conditions = $request->input('conditions');
        $mission_class = $request->input('mission_class');
        $reward = $request->input('reward');
        // データベースに保存
        Missions::create([
            'mission_title' => $mission_title,
            'mission_sentence' => $mission_sentence,
            'conditions' => $conditions,
            'mission_class' => $mission_class,
            'reward' => $reward,
        ]);
        // 成功メッセージを返答
        return response()->json(['message' => 'Event added successfully'], 200);
    }

    // ミッションと参加者の結び付けをする処理
    public function add_mission_participation(Request $request) {
        // Requestから送られた情報を変数に格納
        $mission_id = $request->input('mission_id');
        $team_id = $request->input('team_id');
        $flag = $request->input('flag');
        $achievement_time = $request->input('achievement_time');
        $photo_evidence = $request->input('photo_evidence');
        // データベースに保存
        Mission_participation::create([
            'misson_id' => $mission_id,
            'team_id' => $team_id,
            'flag' => $flag,
            'achievement_time' => $achievement_time,
            'photo_evidence' => $photo_evidence,
        ]);
        // 成功メッセージを返答
        return response()->json(['message' => 'Event added successfully'], 200);
    }

    // ミッションの証拠写真を登録する処理
    public function add_mission_photograph(Request $request) {
        
        // Requestから送られた情報を変数に格納
        $image_path = $request->file('thumbnail')->store('public/avatar/');
        $missionId = $request->input('mission_id'); 
        $teamId = $request->input('team_id');    

        $updatedData = [
            'photo_evidence' => basename($image_path),
        ];

        // データベースを更新
        Mission_participation::where('mission_id', $missionId)
            ->where('team_id', $teamId)
            ->update($updatedData);

        // 成功メッセージを返答
        return response()->json(['message' => 'Event added successfully'], 200);
    }

    // ミッションリストを返す処理
    public function get_mission_list($eventId,$class){

        
        // イベントに対応するミッションを取得
        $MissionEvent = Missions::join('mission_events', 'missions.mission_id', '=', 'mission_events.mission_id')
            ->where('mission_events.event_id', $eventId)  // $eventId は実際のコードでどのように取得されるかによります
            ->select('missions.*')
            ->orderByRaw('mission_class asc')
            ->get();
    
        
        // 配列をJson形式に変換して返す
        $MissionEvent = json_encode($MissionEvent);
        return response($MissionEvent, 200);
    }
    
}
