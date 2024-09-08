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
        $creator = Auth::id();
        $randomNumber = rand(1000, 999999);
        $randomId = intval($userId . $creator . $randomNumber);

        return redirect()->route('dialog', ['dialogId' => $randomId, 'user_1'  => $creator, 'user_2' => $userId]);
    }
    public function delete($dialogId)
    {
        $dialog = Dialog::findOrFail($dialogId);
        $dialog->delete();

        return redirect()->route('dialogs');
    }
}
