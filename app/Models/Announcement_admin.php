<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement_admin extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'created_at'];
}
