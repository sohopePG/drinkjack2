<?php

namespace App\Http\Controllers;

use App\Models\Announcement_admin;
use Illuminate\Http\Request;

class Announcement_adminController extends Controller
{
    //
    public function create()
    {
        return view('nomimatch.show.create_announcement');
    }

public function store(Request $request)
{
    $announcement_admin = new Announcement_admin();

    $announcement_admin->content = $request->content;
    $announcement_admin->title = $request->title;
    $announcement_admin->save();

    // お知らせが作成された後のリダイレクト先を設定
    return redirect()->route('nomimatch.index')->with('success', 'お知らせが作成されました！');
}
    public function show(Announcement_admin $announcement_admin)
    {
        return view('nomimatch.show.admin_announcement')->with('announcement_admin',$announcement_admin);
    }
}
