<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function unreadCount()
{
    $userId = auth()->id();

    $unreadCount = Announcement::where('receiver_id', $userId)
        ->where('read', false)
        ->count();

    return response()->json(['unread_count' => $unreadCount]);
}
public function show(Announcement $announcement)
{
    return view('nomimatch.show.announcement')->with('announcement',$announcement);
}
public function updateReadStatus($announcementId) {
    // 通知の既読フラグを更新する処理を実行
    $announcement = Announcement::findOrFail($announcementId);
    $announcement->update(['read' => true]);

    // 既読フラグが正常に更新された場合のレスポンス
    return response()->json(['message' => '既読フラグが更新されました']);
}
public function updateAllReadStatus() {

    $userId = auth()->user()->id;
    $announcement = Announcement::where('receiver_id', $userId)->where('read', false);
    $announcement->update(['read' => true]);

    // 既読フラグが正常に更新された場合のレスポンス
    return redirect()->route('nomimatch.index');
}
public function checkDrinkRequest($announcementId)
{
    $announcement = Announcement::findOrFail($announcementId);

    if ($announcement->request_id) {
        // 飲みの依頼の通知である場合
        $isSender = $announcement->drinkRequest->sender_id === auth()->id();
        $isReceiver = $announcement->drinkRequest->receiver_id === auth()->id();

        return response()->json([
            'isSender' => $isSender,
            'isReceiver' => $isReceiver,
        ]);
    }

    // 非飲みの依頼の通知の場合
    return response()->json([
        'isSender' => false,
        'isReceiver' => false,
    ]);
}
}
