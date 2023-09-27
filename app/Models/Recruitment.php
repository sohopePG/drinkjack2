<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'deadline',
        'date_time',
        'location',
        'max_participants',
        'status',
        'update_flag',
        'image',
        // 他のフィールドをここに追加
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    // 他のリレーションシップやメソッドを追加
}
