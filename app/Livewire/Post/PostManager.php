<?php
namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostManager extends Component
{
    public $posts;
    public $userId;
    public $perPage = 5;
    public $page = 1;
    public $totalPostsCount;
    protected $listeners = ['postAdded' => 'loadPosts'];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->totalPostsCount = Post::where('user_id', $this->userId)->count();
        $this->posts = Post::with(['user', 'likedUsers'])
            ->where('user_id', $this->userId)
            ->orderBy('created_at', 'desc')
            ->take($this->perPage * $this->page)
            ->get();
    }
    public function loadMore()
    {
        $this->page++;
        $this->loadPosts();
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->likes()->delete();
        $photoPath = 'public/img/upload/posts/' . $post->photo;
        if (Storage::exists($photoPath)) {
            Storage::delete($photoPath);
        }
        $post->delete();
        $this->loadPosts();
    }
    public function addLike($postId)
    {
        $post = Post::find($postId);
        $post->likes()->create(['user_id' => Auth::id()]);
        $post->increment('likes');

        $this->loadPosts();
    }

    public function removeLike($postId)
    {
        $user_id = Auth::id();
        $like = Like::where('user_id', $user_id)->where('post_id', $postId)->first();

        if ($like) {
            $like->delete();
            Post::find($postId)->decrement('likes');
        }

        $this->loadPosts();
    }
    public function render()
    {
        return view('livewire.post.post-manager', ['posts' => $this->posts]);
    }
}

