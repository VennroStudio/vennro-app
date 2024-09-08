<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Dialog;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Livewire\Messages\DialogsList;

class DialogController extends Controller
{
    public function allIndex(Request $request)
    {
        return view('profile.dialogs');
    }
    public function oneIndex(Request $request)
    {
        $im = $request->query('im');
        return view('profile.dialog', ['im' => $im]);
    }
    public function open(Request $request)
    {
        $userId = $request->input('userId');
        $creator = Auth::id();

        $dialog = Dialog::where(function($query) use ($creator, $userId) {
            $query->where('user1_id', $creator)->where('user2_id', $userId);
        })->orWhere(function($query) use ($creator, $userId) {
            $query->where('user1_id', $userId)->where('user2_id', $creator);
        })->first();

        if ($dialog) {
            return redirect()->route('dialog', ['im' => $dialog->id]);
        } else {
//            return $this->create($userId);
            session()->put('user_2', $userId);
            return redirect()->route('dialog');
        }
    }

//    public function create($userId)
//    {
//        $creator = Auth::id();
//        $randomNumber = rand(1000, 999999);
//        $randomId = intval($userId . $creator . $randomNumber);
//        session()->put('user_2', $userId);
//        return redirect()->route('dialog', ['im' => $randomId]);
//    }
    public function delete($dialogId)
    {
        $dialog = Dialog::findOrFail($dialogId);
        $dialog->delete();

        return redirect()->route('dialogs');
    }
}
