<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Dialog;
use App\Models\Message;
use App\Livewire\Messages\DialogsList;

class DialogController extends Controller
{
    public function index()
    {
        return view('profile.dialogs');
    }
    public function create($userId)
    {
        $creater = Auth::id();

        $dialog = new Dialog();
        $dialog->user1_id = $creater;
        $dialog->user2_id = $userId;
        $dialog->save();

        return redirect()->route('dialog', ['dialogId' => $dialog->id]);
    }
    public function delete($dialogId)
    {
        $dialog = Dialog::findOrFail($dialogId);
        $dialog->delete();

        return redirect()->route('dialogs');
    }
}
