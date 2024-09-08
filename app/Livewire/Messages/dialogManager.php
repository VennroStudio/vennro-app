<?php

namespace App\Livewire\Messages;

use Livewire\Component;
use App\Models\Message;
use App\Models\Dialog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DialogManager extends Component
{
    public $dialogId;
    public $user_1;
    public $user_2;

    public $messages;
    public $secondUser;
    public $newMessage;
    public $totalMessagesCount;
    public $perPage = 20;

    public $page = 1;
    protected $listeners = ['loadMessages'];

    public function mount($dialogId)
    {
        $this->dialogId = $dialogId;

        $dialog = Dialog::where('id', $this->dialogId)
            ->where(function($query) {
                $query->where('user1_id', '!=', auth()->id())
                    ->orWhere('user2_id', '!=', auth()->id());
            })
            ->first();

        if ($dialog) {
            $this->secondUser = $dialog->getSayer(auth()->id());
        } else {
            $this->user_2 = session('user_2');
            $this->secondUser = User::find($this->user_2);
        }

        $this->updateMessageStatus();
    }

    public function updateMessageStatus()
    {
        $messages = Message::where('dialog_id', $this->dialogId)
            ->where('sender_id', '!=', Auth::id())
            ->where('status', 1)
            ->get();

        foreach ($messages as $message) {
            $message->status = 0;
            $message->save();
        }
    }

    public function sendMessage()
    {
        $dialog = Dialog::where('id', $this->dialogId)
            ->where(function($query) {
                $query->where('user1_id', '!=', auth()->id())
                    ->orWhere('user2_id', '!=', auth()->id());
            })
            ->first();

        if ($dialog) {
            Message::create([
                'dialog_id' => $dialog->id,
                'sender_id' => Auth::id(),
                'message' => $this->newMessage,
                'status' => 1,
            ]);
            $this->newMessage = '';
        } else {
            $dialog = Dialog::firstOrCreate([
                'user1_id' => Auth::id(),
                'user2_id' => $this->secondUser->id,
            ]);
            Message::create([
                'dialog_id' => $dialog->id,
                'sender_id' => Auth::id(),
                'message' => $this->newMessage,
                'status' => 1,
            ]);
            $this->newMessage = '';
            $this->redirect('/dialog?im=' . $dialog->id);
        }

//        $this->dispatch('updateDialogUrl', $dialog->id);

    }

    public function loadMore()
    {
        $this->page++;
        $this->render();
    }

    public function render()
    {
        $this->totalMessagesCount = Message::where('dialog_id', $this->dialogId)->count();
        $this->messages = Message::where('dialog_id', $this->dialogId)
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->take($this->perPage * $this->page)
            ->get();

        $this->updateMessageStatus();
        return view('livewire.messages.dialog-manager', ['messages' => $this->messages, 'secondUser' => $this->secondUser]);
    }
}
