<?php

namespace App\Http\Controllers;
use App\Models\Missions;
use App\Models\Team;
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
        $flag = 0;
        $achievement_time = $request->input('achievement_time');
        $photo_evidence = $request->input('photo_evidence');
        // データベースに保存
        Mission_participation::create([
            'mission_id' => $mission_id,
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
    $image_path = $request->file('thumbnail')->store('avatar');
    $mission_id = $request->input('mission_id');
    $team_id = $request->input('team_id');

    // 既存のデータがあるか確認
    $existingParticipation = Mission_participation::where('mission_id', $mission_id)
        ->where('team_id', $team_id)
        ->first();

    // 新しいデータを登録または既存のデータを更新
    if ($existingParticipation) {
        // 既存のデータが見つかった場合、更新
        try {
            // 既存のデータが見つかった場合、更新
            $existingParticipation->update([
                'photo_evidence' => basename($image_path),
            ]);
        
            // 成功メッセージを返答
            return response()->json(['message' => 'Event updated successfully'], 200);
        } catch (\Exception $e) {
            // エラーログにエラーメッセージを出力
            \Log::error($e->getMessage());
            
            // エラーレスポンスを返答
            return response()->json(['error' => 'Failed to update event'], 500);
        }
    } else {
        // 既存のデータが見つからなかった場合、新しいデータを登録
        Mission_participation::create([
            'mission_id' => $mission_id,
            'team_id' => $team_id,
            'flag' => 0,  // 適切な初期値に変更するか、リクエストから取得するようにします
            'achievement_time' => now(),  // 同上
            'photo_evidence' => basename($image_path),
        ]);

        // 成功メッセージを返答
        return response()->json(['message' => 'Event added successfully'], 200);
    }
}

    // public function add_mission_photograph(Request $request) {
        
    //     // Requestから送られた情報を変数に格納
    //     $image_path = $request->file('thumbnail')->store('public/avatar/');
    //     $mission_id = $request->input('mission_id'); 
    //     $team_id = $request->input('team_id');    

    //     $updatedData = [
    //         'photo_evidence' => basename($image_path),
    //     ];

    //     // データベースを更新
    //     Mission_participation::where('mission_id', $mission_id)
    //         ->where('team_id', $team_id)
    //         ->update($updatedData);

    //     // 成功メッセージを返答
    //     return response()->json(['message' => 'Event added successfully'], 200);
    // }
    
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
    public function showAddMissionForm()
    {
        return view('add_mission_form');
    }
    
    
    public function showMissions()
    {
        // missionsテーブルの全てのデータを取得
        $missions = Missions::all();
        
        // ビューにデータを渡して表示
        return view('missions', ['missions' => $missions]);
    }
    public function showDetails($id)
    {
        // データベースからミッションを取得
        $mission_details = Missions::where('mission_id', $id)->get();
        
        // ミッションが見つからない場合は0を返す
        if ($mission_details->isEmpty()) {
            return 0;
        }
        $mission = Mission_participation::where('mission_id', $id)
        ->orderBy('flag')
        ->get();

        // ミッションが見つからない場合は0を返す
        if ($mission->isEmpty()) {
            return 0;
        }
        
        // ミッションが見つかった場合はビューにデータを渡して表示
        return view('mission_details', ['missions' => $mission,'mission_details' =>$mission_details]);
    }
    public function check_mission(Request $request) {
        
        // Requestから送られた情報を変数に格納
        $mission_id = $request->input('mission_id'); 
        $team_id = $request->input('team_id');    
        $flag = $request->input('flag');    
    
        $updatedData = [
            'flag' => $flag,
        ];
    
        // データベースを更新
        Mission_participation::where('mission_id', $mission_id)
            ->where('team_id', $team_id)
            ->update($updatedData);
        
        $add = $request->input('reward');
        $team = Team::find($team_id);
        if ($team) {
            $score = $team -> score;
            $score = $score + $add;
            $team->update([  
                'score' => $score,
            ]);
        } 
        // 成功メッセージを返答
        return redirect()->route('mission.details', ['id' => $mission_id]);
    }
}
