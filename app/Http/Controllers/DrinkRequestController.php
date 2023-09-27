<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesRequest;
use App\Models\User;
use App\Models\DrinkRequest;
use App\Models\Announcement;
use App\Models\AnnouncementRead;
use Illuminate\Http\Request;

class DrinkRequestController extends Controller
{
    // ... その他のコード ...
    public function send_index()
    {
        $sendRequests = DrinkRequest::where('requester_id', auth()->id())->get();
        return view('nomimatch.show.send_requests')->with('sendRequests',$sendRequests);
    }

    public function receive_index()
    {
        $receiveRequests = DrinkRequest::where('receiver_id', auth()->id())->get();
        return view('nomimatch.show.receive_requests')->with('receiveRequests',$receiveRequests);
    }

    public function request(Request $request, User $user)
    {
        // 依頼の作成
        $drinkRequest = new DrinkRequest();
        $drinkRequest->requester_id = auth()->id();
        $drinkRequest->receiver_id = $user->id;
        $drinkRequest->comment = $request->comment;
        $drinkRequest->status = '未承認';
        $drinkRequest->save();

        // お知らせの作成
        $announcement = new Announcement();
        $sender = auth()->user();
        $announcement->sender_id = $sender->id;
        $announcement->receiver_id = $user->id;
        $announcement->request_id = $drinkRequest->id;
        $announcement->title = $sender->name . 'さんから飲みの依頼が来ました！';
        $announcement->description = $request->comment;
        $announcement->save();

        return redirect()->route('nomimatch.index')->with('feedback.success', '依頼を送りました！');
    }
    public function handleRequest(DrinkRequest $drinkRequest, Request $request)
    {
        // $drinkRequest モデルを
            // お知らせの作成
            $announcement = new Announcement();
            $sender = auth()->user();
            $announcement->sender_id = $sender->id;
            $announcement->receiver_id = $drinkRequest->requester_id;
            $announcement->request_id = $drinkRequest->id;
            $announcement->description = $request->comment;
        // リクエストに基づいて処理を行います
        if ($request->has('approve')) {
            // 承認ボタンがクリックされた場合の処理
            $drinkRequest->status = '承認';
            $announcement->title = $sender->name . 'さんが飲みの依頼を承認しました！';

            $message = '依頼を承認しました！';
        } elseif ($request->has('deny')) {
            // 否認ボタンがクリックされた場合の処理
            $drinkRequest->status = '否認';
            $message = '依頼を否認しました';
            $announcement->title = $sender->name . 'さんが飲みの依頼を否認しました';
        }

        $announcement->save();
        $drinkRequest->save();

        // 他の必要な処理を追加

        return redirect()->route('nomimatch.index')->with('feedback.success', $message);
    }


}
