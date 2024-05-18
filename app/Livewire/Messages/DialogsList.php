<?php

namespace App\Livewire\Messages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Dialog;
use App\Models\Message;

class DialogsList extends Component
{
    public $userId;
    public $dialogs;

    public function mount()
    {
        $this->userId = Auth::id();
    }

    public function render()
    {
        $this->dialogs = Auth::user()->dialogs()
            ->with(['lastMessage' => function ($query) {
                $query->latest();
            }])
            ->withCount(['lastMessage as messages_count' => function ($query) {
                $query->where('status', 1)
                    ->where('sender_id', '!=', Auth::id());
            }])
            ->orderByDesc(Message::select('created_at')
                ->whereColumn('dialog_id', 'dialogs.id')
                ->latest()
                ->limit(1))
            ->get();

        $this->dialogs = $this->dialogs->filter(function ($dialog) {
            if (!Message::where('dialog_id', $dialog->id)->exists()) {
                $dialog->delete();
                return false;
            }
            return true;
        });

        return view('livewire.messages.dialogs-list');
    }
}
