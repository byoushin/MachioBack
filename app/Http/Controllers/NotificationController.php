<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function addNotification(Request $request)
    {
        $title = $request->input('title');
        $sentence = $request->input('sentence');
        $sendDate = $request->input('send_date');
    
        // 送信日のフォーマットを変更 (Y-m-d から Y-m-d H:i:s に変更)
        $formattedSendDate = $sendDate . ' 00:00:00';
    
        // 新しい通知を作成
        $notification = Notification::create([
            'title' => $title,
            'sentence' => $sentence,
            'send_date' => $formattedSendDate,
        ]);
    
        // 通知が正常に追加されたことを示すビューを表示
        return view('notifications.added', ['notification' => $notification]);
    }
    
//    public function showNotifications()
  //  {
        // notificationsテーブルの全てのデータを取得
    //    $notifications = Notification::all();
    
        // ビューにデータを渡して表示
      //  return view('notifications', ['notifications' => $notifications]);
    //}
    
// app/Http/Controllers/NotificationController.php

public function showAddNotificationForm()
{
    // 通知を追加するためのフォームを表示するロジックを追加
    return view('add_notification_form');
}
public function showNotifications()
{
    // notificationsテーブルの全てのデータを取得
    $notifications = Notification::all();

    // ビューにデータを渡して表示
    return view('notifications', ['notifications' => $notifications]);
}

// app/Http/Controllers/NotificationController.php

public function get_list()
{
    // notificationsテーブルの全てのデータを取得
    $notifications = Notification::all();

    // ビューにデータを渡して表示
    $notifications = json_encode($notifications);

    return response($notifications, 200);
    
}

}
