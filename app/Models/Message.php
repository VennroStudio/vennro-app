<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['dialog_id','sender_id','message','status'];
    public function dialog()
    {
        return $this->belongsTo(Dialog::class, 'dialog_id', 'id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}
