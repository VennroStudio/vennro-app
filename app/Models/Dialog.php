<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    use HasFactory;
    protected $table = 'dialogs';
    public $timestamps = false;
    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function getSayer($userId)
    {
        return $this->user1_id == $userId ? $this->user2 : $this->user1;
    }
    public function lastMessage()
    {
        return $this->hasMany(Message::class, 'dialog_id', 'id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
