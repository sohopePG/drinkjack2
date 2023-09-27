<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'request_id',
        'title',
        'read',
        'description',
    ];

    // Relationship
    public function reads()
    {
        return $this->hasMany(AnnouncementRead::class, 'announcement_id', 'id');
    }

    // Accessor
    public function getUrlAttribute()
    {
        return route('announcement.show', $this->id);
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('m月d日');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function drinkRequest()
    {
        return $this->belongsTo(DrinkRequest::class, 'request_id');
    }
}
