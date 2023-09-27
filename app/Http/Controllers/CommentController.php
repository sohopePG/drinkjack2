<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recruitment;

class CommentController extends Controller
{
    public function create(Request $request, Recruitment $recruitment)
{
    $comment = new Comment();

    $comment->content = $request->content;
    $comment->recruitment_id = $recruitment->id;
    $comment->user_id = auth()->id();
    $comment->save();

    // コメントを新しい順で取得
    $recruitment->load(['comments' => function ($query) {
        $query->orderBy('created_at', 'desc');
    }]);

    return redirect()->route('nomimatch.detal', $recruitment)->with('feedback.success', 'コメントを作成しました！');
}

    public function delete(Comment $comment)
    {
        $comment->delete();
        $recruitment = $comment->recruitment();
        return redirect()->route('nomimatch.detal',$recruitment)->with('feedback.success','コメントを削除しました');
    }
}
