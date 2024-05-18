<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Livewire\Post\LentaManager;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function show()
    {
        $userId = Auth::id();
        return view('profile.news', ['userId' => $userId]);
    }


}
