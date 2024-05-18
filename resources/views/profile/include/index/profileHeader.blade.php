<div class="sol-xl-10 profile_header">
    <div class="profile_avatar">
        <img class="profile_avatar_header" src="{{ asset('storage/img/upload/user/' . $user->photo) }}"
             alt="Аватар профиля">
    </div>
    <div class="profile_info">
        <div class="profile_name"><p class="mb-0">{{ $user->name.' '.$user->lastname }}</p></div>
        <div class="profile_role"><p class="mb-0">{{ $user->rang }}</p></div>
        @if($user->status == 'online')
            <div class="profile_role"><p class="mb-0" style="color:green;">{{ $user->status }}</p></div>
        @else
            <div class="profile_role"><p class="mb-0" style="color:#6a6a6a;">был(а) {{ \Carbon\Carbon::parse($user->last_activity)->diffForHumans() }}</p></div>
        @endif
    </div>
    <div class="profile_button">
        @if(Auth::user()->id == $user->id)
            <a href="" class="btn btn-outline-light">Редактировать</a>
        @else
            <a href="{{ route('create_dialog', ['userId' => $user->id]) }}" class="btn btn-outline-light">Сообщение</a>
        @if( $user->subscribers->contains('id', Auth::user()->id))
            <form action="{{ route('unsubscribe') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="subscriber_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="subscribed_to_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-outline-light ms-2">Отписаться</button>
            </form>
        @else
            <form action="{{ route('subscribe') }}" method="post">
                @csrf
                <input type="hidden" name="subscriber_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="subscribed_to_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-outline-light ms-2">Подписаться</button>
            </form>
        @endif
        @endif
    </div>
</div>
