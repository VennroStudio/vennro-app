<?php

namespace App\Livewire\Messages;

use Livewire\Component;
use App\Models\Message;
use App\Models\Dialog;
use Illuminate\Support\Facades\Auth;

class DialogManager extends Component
{
    public $dialogId;

    public $messages;
    public $secondUser;
    public $newMessage;
    public $totalMessagesCount;
    public $perPage = 20;

    public $page = 1;

    public function mount($dialogId)
    {
        $this->dialogId = $dialogId;
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
        Message::create([
            'dialog_id' => $this->dialogId,
            'sender_id' => Auth::id(),
            'message' => $this->newMessage,
            'status' => 1,
        ]);

        $this->newMessage = '';

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
        $this->secondUser = Dialog::where('id', $this->dialogId)
            ->where(function($query) {
                $query->where('user1_id', '!=', auth()->id())
                    ->orWhere('user2_id', '!=', auth()->id());
            })
            ->first()
            ->getSayer(auth()->id());

        $this->updateMessageStatus();
        return view('livewire.messages.dialog-manager', ['messages' => $this->messages, 'secondUser' => $this->secondUser]);
    }
}
