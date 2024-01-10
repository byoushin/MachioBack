<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>通知一覧</title>
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
            margin-top: 20px; /* 上部のマージンを追加 */
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
            position: absolute;
            top: 10px; /* 上部からの位置を設定 */
            left: 10px; /* 左部からの位置を設定 */
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
            @foreach ($notifications as $notification)
                <li>
                    <strong>タイトル:</strong> {{ $notification->title }}<br>
                    <strong>文章:</strong> {{ $notification->sentence }}<br>
                    <hr>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>

