<div class="modal fade" id="modal_post_{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Оценили пост:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div class="small_user_list d-flex flex-row flex-wrap w-100 mt-3 text-center">
                    @foreach($post->likedUsers as $user)
                        <div class="small_user col d-flex flex-column align-items-center w-25 col-xl-12 mb-2 mt-2">
                            <a href="/profile/id{{ $user -> id }}" style="color: white;text-decoration: none;">
                                <div class="small_user_avatar"><img src="{{ asset('storage/img/upload/user/' . $user->photo) }}" alt="" class="rounded-5"></div>
                                <div class="small_user_name">{{ $user -> name }}</div>
                                <div class="small_user_lastname">{{ $user -> lastname }}</div>
                                @if($user->status == 'online')
                                    <div class="small_user_status"><p class="mb-0" style="color:green;">{{ $user->status }}</p></div>
                                @else
                                    <div class="small_user_status"><p class="mb-0" style="color:#6a6a6a;">{{ $user->status }}</p></div>
                                @endif
                            </a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
