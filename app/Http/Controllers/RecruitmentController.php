<?php

namespace App\Http\Controllers;

use App\Modules\ImageUpload\ImageManagerInterface;
use App\Http\Requests\RecRequest;
use App\Models\Announcement;
use App\Models\Announcement_admin;
use App\Models\Recruitment;
use App\Models\Profile;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class RecruitmentController extends Controller
{

    public function index()
    {
        // 募集一覧を取得
        $recruitments = Recruitment::paginate(9);

        // プロフィールテーブルから「いつでもOK」のユーザーを取得
        $alwaysOkUsers = Profile::where('status', 'いつでもOK')->get();

        $adminAnnouncements = Announcement_admin::orderBy('created_at', 'desc')->get();

        // 募集の日付を 'Y-m-d' 形式にフォーマットする
        foreach ($recruitments as $recruitment) {
            $recruitment->deadline = Carbon::parse($recruitment->deadline)->format('Y-m-d');
            $recruitment->date_time = Carbon::parse($recruitment->date_time)->format('Y-m-d');
        }

        return view('nomimatch.index')
            ->with('recruitments', $recruitments)
            ->with('alwaysOkUsers', $alwaysOkUsers)
            ->with('adminAnnouncements',$adminAnnouncements);
    }
    public function show(Recruitment $recruitment){
        $existingParticipant = Participant::where('user_id', auth()->id())
            ->where('recruitment_id', $recruitment->id)
            ->first();

        $recruitment->deadline = Carbon::parse($recruitment->deadline)->format('Y-m-d');
        $recruitment->date_time = Carbon::parse($recruitment->date_time)->format('Y-m-d');
        return view('nomimatch.show.detal')->with('recruitment',$recruitment)->with('existingParticipant',$existingParticipant);
    }

    public function create(){
        return view('nomimatch.create.createRec');
    }

    public function store(RecRequest $request)
    {
        $recruitment = new Recruitment();
        $recruitment->title = $request->title;
        $recruitment->location = $request->location;
        $recruitment->date_time = $request->date_time;

        if ($request->input('deadline')) {
            $recruitment->deadline = $request->deadline;
        }
        $recruitment->max_participants = $request->max_participants;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $path = Storage::disk('s3')->put('/',$imageName, 'public');
            $recruitment->image = $path;
        }

        $recruitment->description = $request->description;
        $recruitment->status = '募集中';
        $recruitment->user_id = auth()->id();
        $recruitment->save();

        $participant = New Participant();
        $participant->user_id = auth()->id();
        $participant->profile_id = auth()->id();
        $participant->recruitment_id = $recruitment->id;
        $participant->status = '参加予定';

        $participant->save();

        return redirect()->route('nomimatch.index')->with('feedback.success', '募集を作成しました！');
    }

    public function edit(Recruitment $recruitment)
    {
        return view('nomimatch.create.updateRec')->with('recruitment',$recruitment);
    }
   public function update(Recruitment $recruitment, RecRequest $request)
{
    $recruitment->title = $request->title;
    $recruitment->location = $request->location;
    $recruitment->date_time = $request->date_time;

    if ($request->input('deadline')) {
        $recruitment->deadline = $request->deadline;
    }

    $recruitment->max_participants = $request->max_participants;


    if ($request->hasFile('image')) {

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('s3')->put('/',$imageName, 'public');

        $recruitment->image = 'storage/images/' .  $path;
    }

    $recruitment->description = $request->description;
    $recruitment->status = $request->status;
    $recruitment->user_id = auth()->id();
    $recruitment->update_flag = true;
    $recruitment->save();

    return redirect()->route('nomimatch.index')->with('feedback.success', '募集を編集しました！');
}

public function delete(Recruitment $recruitment)
{

    // レコードを削除
    $recruitment->delete();

    // リダイレクトと成功メッセージを追加
    return redirect()->route('nomimatch.index')->with('feedback.success', '募集を削除しました！');
}

}

