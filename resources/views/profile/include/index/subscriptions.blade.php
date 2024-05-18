<div class="small_user_list d-flex flex-row flex-wrap w-100 rounded-3 border mt-3">
    @if(Auth::user()->id == $user->id)
        <div class="text-center w-100"><p class="mt-3 mb-0 text-muted text-center">Ваши подписки</p></div>
    @else
        <div class="text-center w-100"><p class="mt-3 mb-0 text-muted text-center">Подписки пользователя</p></div>
    @endif
    <hr class="my-3 w-100 mb-0">
    @if($user->subscriptions->isEmpty())
        <div class="col d-flex flex-column align-items-center col-xl-12 mb-2 mt-2">
            <img src="/img/no_wall.png" width="40px" class="mb-2 mt-3">
            @if(Auth::user()->id == $user->id)
                <p class="text-muted mb-3">У вас нет подписок</p>
            @else
                <p class="text-muted mb-3">Пользователь ни на кого не подписан</p>
            @endif
        </div>
    @else
        @foreach($user->subscriptions->take(4) as $subscription)
            <div class="small_user col d-flex flex-column align-items-center w-25 col-xl-12 mb-2 mt-2">
                <a href="/profile/id{{ $subscription -> id }}" style="color: white;text-decoration: none;">
                    <div class="small_user_avatar"><img src="{{ asset('storage/img/upload/user/' . $subscription->photo) }}" alt="" class="rounded-5"></div>
                    <div class="small_user_name">{{ $subscription -> name }}</div>
                    <div class="small_user_lastname">{{ $subscription -> lastname }}</div>
                    @if($subscription->status == 'online')
                        <div class="small_user_status"><p class="mb-0" style="color:green;">{{ $subscription->status }}</p></div>
                    @else
                        <div class="small_user_status"><p class="mb-0" style="color:#6a6a6a;">{{ $subscription->status }}</p></div>
                    @endif
                </a></div>
        @endforeach
    @endif
</div>


<div class="small_user_list d-flex flex-row flex-wrap w-100 rounded-3 border mt-3">
    @if(Auth::user()->id == $user->id)
        <div class="text-center w-100"><p class="mt-3 mb-0 text-muted text-center">Ваши подписчики</p></div>
    @else
        <div class="text-center w-100"><p class="mt-3 mb-0 text-muted text-center">Подписчики пользователя</p></div>
    @endif
    <hr class="my-3 w-100 mb-0">
    @if($user->subscribers->isEmpty())
        <div class="col d-flex flex-column align-items-center col-xl-12 mb-2 mt-2">
        <img src="/img/no_wall.png" width="40px" class="mb-2 mt-3">
        @if(Auth::user()->id == $user->id)
            <p class="text-muted mb-3">У вас нет подписчиков</p>
        @else
            <p class="text-muted mb-3">На пользователя никто не подписан</p>
        @endif
        </div>
    @else
    @foreach($user->subscribers->take(4) as $subscriber)
        <div class="small_user col d-flex flex-column align-items-center w-25 col-xl-12 mb-2 mt-2">
            <a href="/profile/id{{ $subscriber -> id }}" style="color: white;text-decoration: none;">
            <div class="small_user_avatar"><img src="{{ asset('storage/img/upload/user/' . $subscriber->photo) }}" alt="" class="rounded-5"></div>
            <div class="small_user_name">{{ $subscriber -> name }}</div>
            <div class="small_user_lastname">{{ $subscriber -> lastname }}</div>
            @if($subscriber->status == 'online')
                <div class="small_user_status"><p class="mb-0" style="color:green;">{{ $subscriber->status }}</p></div>
            @else
                <div class="small_user_status"><p class="mb-0" style="color:#6a6a6a;">{{ $subscriber->status }}</p></div>
            @endif
            </a></div>
    @endforeach
    @endif
</div>
