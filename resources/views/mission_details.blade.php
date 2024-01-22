<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ミッション一覧</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            width: 100%;
            margin: 20px auto;
        }

        .mission-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 48%; /* 画面幅の半分に設定 */
            text-align: left;
            position: relative;
            overflow-y: auto;
            max-height: 75vh;
        }

        .detail-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 48%; /* 画面幅の半分に設定 */
            text-align: left;
            position: relative;
            overflow-y: auto;
            max-height: 75vh;
        }

        h1 {
            font-size: 40px;
            color: #555;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-family: '游ゴシック体', 'Yu Gothic', 'メイリオ', Meiryo, sans-serif; 
            text-align: center;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            background-color: #eee;
            padding: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            position: relative;
        }

        strong {
            color: #007bff;
            display: inline;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 10px;
            top: 10px;
            left: 10px;
        }
        
        a:hover {
            text-decoration: underline;
        }
        </style>
</head>
<body>
    <h1>ミッション一覧</h1>
    <a href="{{ route('home') }}">ホーム画面へ戻る</a>
    
    <div class="container">
    <div class="detail-container">
            <ul>            
                <li>
                    <strong>ミッションタイトル:</strong> {{ $mission_details->first()->mission_title }}<br>
                    <strong>ミッション本文:</strong> {{ $mission_details->first()->mission_sentence }}<br>
                    <strong>達成条件:</strong> {{ $mission_details->first()->conditions }}<br>
                    <strong>ミッションクラス:</strong> {{ $mission_details->first()->mission_class ? '通常' : '緊急' }}<br>
                    <strong>報酬金:</strong> {{ $mission_details->first()->reward }}<br>
                </li>
            </ul>
        </div>
        <div class="mission-container">
            <ul>
                @foreach($missions as $mission)
                    <li>
                        <strong>ミッションタイトル:</strong> {{ $mission->team_id }}<br>
                        <strong>ミッション本文:</strong> {{ $mission->flag }}<br>
                        <strong>達成条件:</strong> {{ $mission->updated_at }}<br>
                        
                        @if ($mission->flag != 2)
                        {{-- 承認ボタン --}}
                        <form action="{{ route('check_mission', ['mission_id' => $mission->mission_id, 'team_id' => $mission->team_id, 'flag' => 2, 'reward' => $mission_details->first()->reward]) }}" method="post">
                            @csrf
                            <button type="submit">承認</button>
                        </form>
                        
                        {{-- 却下ボタン --}}
                        <form action="{{ route('check_mission', ['mission_id' => $mission->mission_id, 'team_id' => $mission->team_id, 'flag' => 1, 'reward' => $mission_details->first()->reward]) }}" method="post">
                            @csrf
                            <button type="submit">却下</button>
                        </form>
                        @endif
                        <img src="{{asset('storage/' . $mission->photo_evidence) }}" alt="Your Image" width='100%'>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</body>
</html>
