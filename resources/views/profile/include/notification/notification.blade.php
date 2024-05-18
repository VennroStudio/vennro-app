<div class="p-2 mb-3 bg-body-tertiary rounded-3">
    @if($notifications->isEmpty())
        <div class="col d-flex flex-column align-items-center col-xl-12 mb-2 mt-2">
            <img src="/img/no_wall.png" width="40px" class="mb-2 mt-3">
                <p class="text-muted mb-3">У вас нет уведомлений</p>
        </div>
    @else
        <hr class="my-4 mb-2 mt-2">
    @foreach($notifications as $notification)
        <div class="heder_post d-flex flex-row flex-nowrap align-content-center justify-content-between">
            <div class="info_user_post d-flex flex-row flex-nowrap align-items-start">
                <div class="user_post_avatar"><img src="{{ asset('storage/img/upload/user/' . $notification->user->photo) }}"></div>
                <div class="user_post_info d-flex flex-column flex-nowrap align-content-start justify-content-center align-items-start ms-2">
                    <p class="info_post_name mb-0 fs-6 fw-semibold">Пользователь <a href="{{route('profile.show', ['userId'=>$notification->user->id])}}" style="text-decoration: none;color: #71aaeb;">{{ $notification->user->name.' '.$notification->user->lastname }}</a> {{ $notification->event->message }}.</p>
                    <p class="info_post_created mb-0 fw-semibold text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->isoFormat('D MMMM [в] HH:mm') }}
                    </p>
                </div>
            </div>
        </div>
        <hr class="my-4 mb-2 mt-2">
    @endforeach
    @endif
</div>
