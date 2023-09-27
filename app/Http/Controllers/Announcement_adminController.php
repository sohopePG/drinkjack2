<?php

namespace App\Http\Controllers;

use App\Models\Announcement_admin;
use Illuminate\Http\Request;

class Announcement_adminController extends Controller
{
    //


    public function show(Announcement_admin $announcement_admin)
    {
        return view('nomimatch.show.admin_announcement')->with('announcement_admin',$announcement_admin);
    }
}
