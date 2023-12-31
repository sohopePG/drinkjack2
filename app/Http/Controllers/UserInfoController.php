<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;


class UserInfoController extends Controller
{
    //
    public function edit(Profile $profile)
    {
        return view('nomimatch.show.userinfo')->with('profile',$profile);
    }

    public function detail(Profile $profile)
    {
        return view('nomimatch.show.detail_user')->with('profile',$profile);
    }

    public function update(Request $requset , Profile $profile)
    {
        $profile->bio = $requset->bio;
        $profile->location = $requset->location;
        $profile->group = $requset->group;
        if ($requset->hasFile('image')) {
            $image = $requset->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // S3に画像をアップロード
            Storage::disk('s3')->putFileAs('/', $image, $imageName);

            // 画像のURLをデータベースに保存
            $profile->image = $imageName;
        }


        $profile->save();
        return redirect()->route('nomimatch.user_detail',$profile)->with('feedback.success', '保存しました');
    }
    public function toggle(Profile $profile)
    {
        if($profile->status === 'いつでも飲みOKオフ')
        {
            $profile->status = 'いつでもOK';
            $str = 'いつでも飲みOKに設定しました！' ;
        }else
        {
            $profile->status = 'いつでも飲みOKオフ';
            $str = 'いつでも飲みOKをオフにしました';
        }

        $profile->save();
        return redirect()->route('nomimatch.index')->with('feedback.success',$str );
    }

    public function show(Profile $profile)
    {
        return view('nomimatch.show.mail_flag')->with('profile',$profile);
    }
    public function toggle_mail(Request $request,Profile $profile)
    {
        // チェックボックスの値を取得してプロフィールに設定
        $profile->send_email_on_participant = $request->has('send_email_on_participant');
        $profile->send_email_on_drink_request = $request->has('send_email_on_drink_request');
        $profile->send_email_on_request_result = $request->has('send_email_on_request_result');

        // プロフィールを保存
        $profile->save();

        return redirect()->back()->with('feedback.success', 'メール送信設定が保存されました');
    }
}
