<!-- index.blade.php -->

<html>
<head>
    @vite(['resources/css/leaflet.css', 'resources/js/leaflet.js'])
</head>
<body>
    <div class="top">
        <a href="{{ route('home') }}" class="mt-3 btn btn-secondary">ホーム画面へ戻る</a>
        <button id="updateButton" class="mt-3 btn btn-primary">マーカーを更新</button>
    </div>

    <div id="map"></div>
</body>
</html>
