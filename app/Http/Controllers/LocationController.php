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
            ->where('participations.event_id', $event_id)
            ->select('participations.*', 'teams.team_name', 'teams.latitude as team_latitude', 'teams.longitude as team_longitude')
            ->get();

        // 必要な情報を配列に格納
        $locationArray = [];

        foreach ($participationsWithTeamName as $location) {
            $latitude =  $location->team_latitude; // Participationsテーブルのlatitude
            $longitude =  $location->team_longitude; // Participationsテーブルのlongitude
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
        $team_id = $request->input('team_id');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // 参加IDでデータベースを検索し、ヒットしたデータの緯度と経度を更新する
        $team = team::find($team_id);
        if ($team) {
            $team->update([  
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        } 
        // 成功メッセージを返す
        return response()->json(["message" => "Location updated successfully"], 200);

    }

    public function map()
    {
        return view('map');
    }
    public function getMap()
    {
        $locationArray = [];
        $event_id = 1;
        //指定されたイベントの参加者の位置情報を取り出す
        $participationsWithTeamName = Participation::join('teams', 'participations.team_id', '=', 'teams.team_id')
            ->where('participations.event_id', $event_id)
            ->select('participations.*', 'teams.team_name', 'teams.latitude as team_latitude', 'teams.longitude as team_longitude')
            ->get();

        // 必要な情報を配列に格納
        $locationArray = [];

        foreach ($participationsWithTeamName as $location) {
            $latitude =  $location->team_latitude; // Participationsテーブルのlatitude
            $longitude =  $location->team_longitude; // Participationsテーブルのlongitude
            $team_name = $location->team_name;
            
            $locationArray[] = ['lat' => $latitude, 'lng' => $longitude, 'name' => $team_name];
        }
        

        return response()->json($locationArray);
    }
    
}
