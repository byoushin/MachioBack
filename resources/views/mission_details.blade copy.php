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

        .mission-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            text-align: left;
            position: relative;
            overflow-y: auto;
            max-height: 75vh;
            margin-top: 10px; /* 上部のマージンを追加 */
        }

        h1 {
            font-size: 40px;
            color: #555; /* グレーっぽい色 */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-family: '游ゴシック体', 'Yu Gothic', 'メイリオ', Meiryo, sans-serif; 
            text-align: center;
            margin-top: 15px; /* 上部のマージンを追加 */
            margin-bottom: 10px; /* 上部のマージンを追加 */
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
            /* position: absolute; この行を削除またはコメントアウトするか、position: relative; に変更する */
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
    
    <div class="mission-container">
        <ul>
            @foreach($missions as $mission)
            <li>
                <strong>ミッションタイトル:</strong> {{ $mission->team_id }}<br>
                <strong>ミッション本文:</strong> {{ $mission->flag }}<br>
                <strong>達成条件:</strong> {{ $mission->updated_at }}<br>
                <img src="{{asset('storage/5RXi6Zhc0RboNdgkFljtEqbCja1JKOcc0NM9Kb64.jpg')}}" width='50vw'>
                <img src="{{ asset('storage/avatar/' . $mission->image_filename) }}" alt="Mission Image">
                <!-- <img src="{{ asset('storage/avatar/' . $mission->image_filename) }}" alt="Mission Image"> -->
                
                
                @if ($mission->flag != 2)
                {{-- 承認ボタン --}}
                        <form action="{{ route('check_mission', ['mission_id' => $mission->mission_id, 'team_id' => $mission->team_id, 'flag' => 2, 'reward' => $mission_details->reward]) }}" method="post">
                            @csrf
                            <button type="submit">承認</button>
                        </form>

                        {{-- 却下ボタン --}}
                        <form action="{{ route('check_mission', ['mission_id' => $mission->mission_id, 'team_id' => $mission->team_id, 'flag' => 1, 'reward' => $mission_details->reward]) }}" method="post">
                            @csrf
                            <button type="submit">却下</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>

    </div>
</body>
</html>