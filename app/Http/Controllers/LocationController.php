<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\User;
use App\Models\Event;
use App\Models\Team;

class LocationController extends Controller{
    // 位置情報を返す処理
    public function get_location($event_id){
        // 位置情報を入れる配列
        $locationArray = [];
    
        //指定されたイベントの参加者の位置情報を取り出す
        $participationsWithTeamName = Participation::join('teams', 'participations.team_id', '=', 'teams.team_id')
            ->where('participations.event_id', $event_id)  // $eventId は実際のコードでどのように取得されるかによります
            ->select('participations.*', 'teams.team_name')
            ->get();

        // 必要な情報を配列に格納
        foreach ($participationsWithTeamName as $location) {
            $latitude = $location->latitude;
            $longitude = $location->longitude;
            $team_name = $location->team_name;
            $locationArray[] = [$team_name, $latitude, $longitude];
        }
        
        // 配列をJson形式に変換して返す
        $locationArray = json_encode($locationArray);
        return response($locationArray, 200);
    }

    //位置情報を更新する処理
    public function up_location(Request $request){
        // Requestをもとに送られた情報を変数に格納
        $participation_id = $request->input('participation_id');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // 参加IDでデータベースを検索し、ヒットしたデータの緯度と経度を更新する
        $participation = Participation::find($participation_id);
        if ($participation) {
            $participation->update([  
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        } 
        // 成功メッセージを返す
        return response()->json(["message" => "Location updated successfully"], 200);

    }

    // チームを追加する処理
    public function add_team(Request $request) {
        $leader_id = $request->input('leader_id');
        $team_name = $request->input('team_name');
        Team::create([
            'leader_id' => $leader_id,
            'team_name' => $team_name,
        ]);
        return response()->json(['message' => 'Team added successfully'], 200);
    }

    // チームを追加する処理
    public function get_myinfo($participation_id) {
        $participation = Participation::find($participation_id);
    
        if (!$participation) {
            // レコードが存在しない場合のエラーハンドリング
            return response()->json(['error' => 'Participation not found'], 404);
        }
    
        return response()->json($participation, 200);
    }
    

    // チームを追加する処理
    public function up_score(Request $request) {
        $participation_id = $request->input('participation_id');
        $add = $request->input('add');
        $participation = Participation::find($participation_id);
        if ($participation) {
            $score = $participation -> score;
            $score = $score + $add;
            $participation->update([  
                'score' => $score,
            ]);
        } 
        return response()->json(['message' => 'Team added successfully'], 200);
    }
}
