<div class="small_user_list d-flex flex-row flex-wrap w-100 rounded-3 border mt-3">
    <div class="text-center w-100"><p class="mt-3 mb-0 text-muted text-center">Все пользователи</p>
    </div>
    <hr class="my-3 w-100 mb-0">
    @foreach($users as $all)
        <div class="small_user col d-flex flex-column align-items-center w-25 col-xl-12 mb-2 mt-2">
            <a href="/profile/id{{ $all -> id }}" style="color: white;text-decoration: none;">
            <div class="small_user_avatar"><img src="{{ asset('storage/img/upload/user/' . $all->photo) }}" alt="" class="rounded-5"></div>
            <div class="small_user_name">{{ $all -> name }}</div>
            <div class="small_user_lastname">{{ $all -> lastname }}</div>
            @if($all->status == 'online')
                <div class="small_user_status"><p class="mb-0" style="color:green;">{{ $all->status }}</p></div>
            @else
                <div class="small_user_status"><p class="mb-0" style="color:#6a6a6a;">{{ $all->status }}</p></div>
            @endif
            </a></div>
    @endforeach
</div>
