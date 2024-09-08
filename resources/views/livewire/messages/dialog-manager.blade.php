<div class="p-2 mb-3 bg-body-tertiary rounded-3" wire:poll>
    <div class="d-flex flex-row flex-nowrap justify-content-between w-100">
        <div class="d-flex flex-row flex-nowrap align-content-center justify-content-start" style="width:33%">
            <a href="{{route('dialogs')}}" class="mt-2 text-muted" style="text-decoration: none;">&nbsp;&nbsp;❮❮ Назад</a>
        </div>
        <div class="d-flex flex-column flex-nowrap align-content-center justify-content-center" style="width:33%">
            <a href="{{route('profile.show', ['userId' => $secondUser->id])}}" style="text-decoration: none;">
        <p class="mt-0 mb-0 d-flex align-content-center justify-content-center" style="color: white;">{{ $secondUser->name.' '.$secondUser->lastname}}</p>
        <p class="mb-0 d-flex align-content-center justify-content-center text-muted" style="font-size: 10px;">{{ $secondUser->status }}</p>
            </a>
        </div>
        <div class="d-flex flex-row flex-nowrap align-content-center justify-content-end" style="width:33%">
            @if($dialogId)
        <form action="{{ route('dialog.delete', ['dialogId' => $dialogId]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="border border-0 bg-transparent rounded-4 p-2"><img src="/img/del_post.png"></button>
        </form>
            @endif
        </div>
    </div>
    <hr class="my-4 mb-2 mt-2">
    <div class="dialog-chat p-2" id="scrollableDiv">
        @forelse ($messages as $message)
            @if($message->status === '1')
                <div class="message-dialog d-flex flex-row flex-nowrap align-content-center justify-content-between text-bg-secondary">
            @else
                <div class="message-dialog d-flex flex-row flex-nowrap align-content-center justify-content-between">
            @endif
                <div class="d-flex flex-row flex-nowrap align-items-start" style="width: 80%;">
                        <div class="dialog_avatar" style="margin-top: 2px;"><img src="{{ asset('storage/img/upload/user/' . $message->sender->photo) }}"></div>
                        <div class="d-flex flex-column flex-nowrap align-content-start justify-content-center align-items-start ms-2 w-100">
                            <p class="mb-0 fw-semibold" style="font-size: 12px;color: #71aaeb;">{{ $message->sender->name }}</p>
                            <p class="message mb-0 fw-semibold text-muted">{!! nl2br($message->message) !!}</p>
                        </div>
                    </div>
                <div class="sayer_controller d-flex flex-column flex-nowrap align-items-center justify-content-start">
                    <p class="text-muted fw-semibold mb-0" style="font-size: 11px;">{{ $message->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @empty
                            <p class="text-muted text-center p-5">Пока сообщений нет</p>
        @endforelse
        @if(count($messages) < $totalMessagesCount)
            <div class="d-flex flex-column align-items-center justify-content-center mb-3">
                <button wire:click="loadMore" class="btn btn-outline-light w-100">Загрузить еще</button>
            </div>
        @endif
    </div>
    <hr class="my-4 mb-2 mt-1">
    <form wire:submit.prevent="sendMessage" id="messageForm" action="/send-message" method="post" class="d-flex flex-row flex-nowrap align-content-center justify-content-center">
        @csrf
        <input type="hidden" name="dialogId" value="{{ $dialogId }}">
        <textarea type="text" wire:model.defer="newMessage" name="message" class="dialog-textarea p-2 border bg-dark rounded-4" onkeydown="handleEnter(event)" placeholder="Напишите сообщение..."></textarea>
        <button type="submit" class="button-dialog border bg-dark rounded-4"><img src="/img/send.png" class="send_wall"></button>
    </form>

    <script>
        function handleEnter(event) {
            if (event.keyCode === 13 && !event.shiftKey) {
                event.preventDefault();
                const textarea = event.target;
                const value = textarea.value;
                const selectionStart = textarea.selectionStart;
                const selectionEnd = textarea.selectionEnd;
                const before = value.substring(0, selectionStart);
                const after = value.substring(selectionEnd);
                textarea.value = before + "\n" + after;
                textarea.setSelectionRange(selectionStart + 1, selectionStart + 1);
            }
        }
    </script>
{{--                <script>--}}
{{--                    document.addEventListener('livewire:init', function () {--}}
{{--                        Livewire.on('updateDialogUrl', dialogId => {--}}
{{--                            window.history.pushState(null, null, '/dialog?im=' + dialogId);--}}
{{--                        });--}}
{{--                    });--}}
{{--                </script>--}}
    </div>
