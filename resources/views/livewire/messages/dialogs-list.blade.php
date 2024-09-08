<div class="dialog-list p-4 mb-3 bg-body-tertiary rounded-3" wire:poll>
    <hr class="my-4 mb-2 mt-2">
    @forelse($dialogs as $dialog)
        <a href="{{ route('dialog', ['im' => $dialog->id]) }}" style="color: white;text-decoration: none;">
            <div class="dialogs d-flex flex-row flex-nowrap align-content-center justify-content-between">
                <div class="d-flex flex-row flex-nowrap align-items-start" style="width: 80%;">
                    <div class="sayer_avatar">
                        @if($dialog->getSayer($userId)->status === 'online')
                            <span></span>
                        @endif
                        <img src="{{ asset('storage/img/upload/user/' . $dialog->getSayer($userId)->photo) }}">
                    </div>
                    <div class="d-flex flex-column flex-nowrap align-content-start justify-content-center align-items-start ms-2 w-100">
                        <p class="mb-0 fw-semibold" style="font-size: 14px;">{{ $dialog->getSayer($userId)->name.' '.$dialog->getSayer($userId)->lastname }}</p>

                            @if($dialog->lastMessage->first()->status == 1)
                                <p class="message mb-0 fw-semibold text-muted text-bg-secondary w-100" style="padding: 3px;">{{ Illuminate\Support\Str::limit($dialog->lastMessage->first()->message, $limit = 35, $end = '...') }}</p>
                            @else
                                <p class="message mb-0 fw-semibold text-muted">{{ Illuminate\Support\Str::limit($dialog->lastMessage->first()->message, $limit = 35, $end = '...') }}</p>
                            @endif

                    </div>
                </div>
                <div class="sayer_controller d-flex flex-column flex-nowrap align-items-center justify-content-center" style="width: 20%;">
                    @if($dialog->messages_count > 0)
                    <p class="text-muted fw-semibold mb-1 mt-2" style="font-size: 11px;">{{ $dialog->lastMessage->first()->created_at->diffForHumans() }}</p>
                    <p class="new-messages text-bg-secondary text-center fw-semibold">{{ $dialog->messages_count }}</p>
                    @else
                    <p class="text-muted fw-semibold mb-0" style="font-size: 11px;">{{ $dialog->lastMessage->first()->created_at->diffForHumans() }}</p>
                    @endif
                </div>
            </div>
        </a>
        <hr class="my-4 mb-2 mt-2">
        @empty
            <p class="text-muted text-center p-5">Вы пока не начинали ни с кем диалог</p>
        @endforelse
</div>

