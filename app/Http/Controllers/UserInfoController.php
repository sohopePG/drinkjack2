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
            if (!Storage::exists('public/images')) {
                Storage::makeDirectory('public/images');
            }
            $image = $requset->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images',$imageName);
            $profile->image = 'storage/images/' . $imageName;
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
}
