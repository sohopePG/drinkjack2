<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use App\Models\Participant;
use App\Models\Announcement;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function participate(Recruitment $recruitment)
    {
        $existingParticipant = Participant::where('user_id', auth()->id())
            ->where('recruitment_id', $recruitment->id)
            ->first();

        if ($existingParticipant) {
            return redirect()->route('nomimatch.detal', $recruitment)->with('error', '既にこの飲み会に参加しています。');
        } else {
            $newparticipant = new Participant();
            $newparticipant->user_id = auth()->id();
            $newparticipant->profile_id = auth()->id();
            $newparticipant->recruitment_id = $recruitment->id;
            $newparticipant->status = '参加予定';
            $newparticipant->save();

            // お知らせの作成
            $announcement = new Announcement();
            $sender = auth()->user();
            $announcement->sender_id = $sender->id;
            $announcement->receiver_id = $recruitment->user_id;
            $announcement->title = $sender->name . 'さんが' . $recruitment->title . 'に参加しました！';
            $announcement->save();

            return redirect()->route('nomimatch.detal', $recruitment)
                ->with('feedback.success', '参加しました');
        }

    }
    public function cancel(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('nomimatch.detal', $participant->recruitment)
                ->with('feedback.success', '参加キャンセルしました');
    }
}
