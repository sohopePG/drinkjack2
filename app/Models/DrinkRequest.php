<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id',
        'receiver_id',
        'comment',
        'status',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class);
    }
}
