<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'user_id', 'related_user_id', 'notifiable_type', 'notifiable_id', 'status',
    ];

    public function notifiable()
    {
        return $this->morphTo(Subscription::class);
    }
    public function like()
    {
        return $this->belongsTo(Like::class, 'notifiable_id');
    }
    public function post()
    {
        $postId = $this->like->post_id;
        return Post::find($postId);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'related_user_id');
    }

}
