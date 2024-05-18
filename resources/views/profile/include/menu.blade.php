<div class="p-3 bg-body-tertiary rounded-3 col-xl me-2">
    <div class="list-group">
        <a href="{{ route('profile.show', ['userId' => Auth::user()->id]) }}" class="list-group-item list-group-item-action text-muted">Профиль</a>
        <a href="{{route('notifications')}}" class="list-group-item list-group-item-action text-muted">Уведомления</a>
        <a href="{{ route('dialogs') }}" class="list-group-item list-group-item-action text-muted">Сообщения</a>
        <a href="{{ route('news.show') }}" class="list-group-item list-group-item-action text-muted">Лента</a>
        <a href="#" class="list-group-item list-group-item-action text-muted">Настройки</a>
    </div>
</div>
