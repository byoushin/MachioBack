// webpack.mix.js もしくは laravel-mix.js など
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       //
   ])
   .setResourceRoot('https://011a-114-142-110-43.ngrok-free.app/')  // ここを HTTPS に変更
   .setPublicPath('public');
