<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'status',
        'location',
        'group',
        'image',
        // 他のフィールドをここに追加
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 他のリレーションシップやメソッドを追加
}
