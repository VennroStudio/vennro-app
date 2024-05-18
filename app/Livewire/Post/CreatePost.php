<?php
namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $comment;
    public $photo;
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::id();
    }
    public function removePhoto()
    {
        $this->photo = null;
    }
    public function addPost()
    {
        $this->validate([
            'comment' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        $filename = null;
        if ($this->photo) {
            $filename = Str::random(10) . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/img/upload/posts', $filename);
        }

        $commentWithBr = nl2br($this->comment);

        Post::create([
            'user_id' => $this->user_id,
            'comment' => $commentWithBr,
            'photo' => $filename,
        ]);

        $this->reset(['comment', 'photo']);
        $this->dispatch('postAdded');
    }


    public function render()
    {
        return view('livewire.post.create-post');
    }
}


