<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>まちなか鬼ごっこ運営ページ</title>

    <style>
        /* 全体のスタイル */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* タイトルのスタイル */
        h1 {
            font-size: 50px;
            margin-bottom:70px;
            margin-top: -70px;
            color: #555; /* グレーっぽい色 */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-family: '游ゴシック体', 'Yu Gothic', 'メイリオ', Meiryo, sans-serif; /* 別のフォントを指定 */
        }

        /* ボタンのスタイル */
        .button-container {
            display: flex;
            gap: 20px;
        }

        .round-button {
            text-decoration: none;
            color: #fff;
            display: inline-block;
            width: 200px; /* ボタンの横幅を設定 */
            height: 200px; /* ボタンの縦幅を設定 */
            font-size: 17px; /* テキストのフォントサイズを設定 */
            font-weight: bold; /* テキストを太くする */
            border-radius: 50%; /* 50%にすることで円形になります */
            background-color: #007bff;
            line-height: 200px; /* ボタン内のテキストを垂直方向に中央寄せ */
            text-align: center; /* ボタン内のテキストを水平方向に中央寄せ */
            transition: background-color 0.3s ease;
            margin: 10px;
        }

        .round-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<?php

$event_id = 1;
?>
<body>
    <!-- タイトル -->
    <h1>まちなか鬼ごっこ<span style="font-size: 20px;"> 運営ページ</span></h1>

    <!-- ボタンのHTMLコード -->
    <div class="button-container">
        <a href="{{ url('/map') }}" class="round-button">マップ</a>
        <a href="{{ url('/show-notifications') }}" class="round-button">通知一覧</a>
        <a href="{{ route('add-notification') }}" class="round-button">通知追加</a>
    </div>
    <div class="button-container">
        <a href="{{ route('add-mission-form') }}" class="round-button">ミッション追加フォーム</a>
        <a href="{{ url('/show-missions') }}" class="round-button">ミッション一覧</a>
        <a href="{{ url('/score_move/'.$event_id) }}" class="round-button">ポイント移動</a>
    </div>
    <div class="button-container">
        <a href="{{ url('/add_user_form') }}" class="round-button">ユーザ登録</a>
        <a href="{{ url('/add_team_form') }}" class="round-button">チーム登録</a>
        <a href="{{ url('/add_participation_form/'.$event_id) }}" class="round-button">参加者追加</a>

    </div>
</body>

</html>
