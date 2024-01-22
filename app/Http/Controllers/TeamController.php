<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\User;
use App\Models\Event;
use App\Models\Team;

class TeamController extends Controller
{
    
    // チームを追加する処理
    public function add_team(Request $request) {
        $leader_id = $request->input('leader_id');
        $team_name = $request->input('team_name');
        $score = 500;
    
        // 追加: latitude と longitude の仮の値を設定
        $latitude = 0.0;
        $longitude = 0.0;
    
        $team = Team::create([
            'leader_id' => $leader_id,
            'team_name' => $team_name,
            'score' => $score,
            'latitude' => $latitude, // 追加
            'longitude' => $longitude, // 追加
        ]);
        return view('teams.added', ['team' => $team]);
        // return response()->json(['message' => 'Team added successfully'], 200);
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
        
    
        // ポイントを加算する処理
        public function up_score(Request $request) {
            $team_id = $request->input('team_id');
            $event_id = $request->input('event_id');
            $score = $request->input('score');
            $team = Team::find($team_id);
            if ($team) {
                $team->update([  
                    'score' => $score,
                ]);
            } 
            
            $teams = Team::join('participations', 'participations.team_id', '=', 'teams.team_id')
            ->where('participations.event_id', $event_id) 
            ->select('teams.team_id', 'teams.*') // ここで 'teams.team_id' を指定
            ->distinct()
            ->orderBy('teams.team_id', 'asc') 
            ->get();
            
            return view('score_move', ['teams' => $teams,'event_id' => $event_id]);
        }
        public function add_team_form()
        {
            // teamssテーブルの全てのデータを取得
            $users = User::all();
        
            // ビューにデータを渡して表示
            return view('add_team_form', ['users' => $users]);
            // 通知を追加するためのフォームを表示
        }

        public function score_move($event_id)
        {
            // missionsテーブルの全てのデータを取得
            $teams = Team::join('participations', 'participations.team_id', '=', 'teams.team_id')
            ->where('participations.event_id', $event_id) 
            ->select('teams.team_id', 'teams.*') // ここで 'teams.team_id' を指定
            ->distinct()
            ->orderBy('teams.team_id', 'asc') 
            ->get();
        
            // ビューにデータを渡して表示
            return view('score_move', ['teams' => $teams,'event_id' => $event_id]);
            // 通知を追加するためのフォームを表示
        }
}
