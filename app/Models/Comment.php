<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recruitment_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }

    // 他のリレーションシップやメソッドを追加
}
