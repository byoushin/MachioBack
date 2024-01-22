import 'leaflet/dist/leaflet.css';
import L from 'leaflet';


        const map = L.map('map').setView([33.5956521, 130.4071971], 10);

        // APIから位置情報を取得して地図にマーカーを追加する関数
        async function addMarkers() {
            const response = await fetch('/locations');
            const locations = await response.json();

            // マーカーを一旦クリア
            map.eachLayer(layer => {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });

            // 新しい位置情報でマーカーを再追加
            locations.forEach(location => {
                const marker = L.marker([location.lat, location.lng]).addTo(map);
                marker.bindPopup(`<b>${location.name}</b>`);
            });
        }

        // 更新ボタンがクリックされたときの処理
        document.getElementById('updateButton').addEventListener('click', addMarkers);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        addMarkers(); // ページが読み込まれたらマーカーを追加する

        // 1分ごとに位置情報を取得してマーカーを更新
        setInterval(addMarkers, 60000); // 1分 = 60,000ミリ秒