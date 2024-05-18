<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Livewire\Messages\DialogManager;
use App\Models\Message;

class MessageController extends Controller
{
    public function index($dialogId)
    {
        return view('profile.dialog', compact(  'dialogId'));
    }
}

