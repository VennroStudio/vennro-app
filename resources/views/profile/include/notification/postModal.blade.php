<div class="modal fade" id="modal_post_{{$notification->like->post->id}}" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body scroll-black">


                <div class="header_post d-flex flex-row flex-nowrap align-content-center justify-content-between">
                    <div class="info_user_post d-flex flex-row flex-nowrap align-items-start">
                        <div class="user_post_avatar"><img src="{{ asset('storage/img/upload/user/' . $notification->post()->user->photo) }}"></div>
                        <div class="user_post_info d-flex flex-column flex-nowrap align-content-start justify-content-center align-items-start ms-2">
                            <p class="info_post_name mb-0 fs-6 fw-semibold">{{ $notification->post()->user->name.' '.$notification->post()->user->lastname }}</p>
                            <p class="info_post_created mb-0 fw-semibold text-muted">{{ $notification->like->post->updated_at }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mt-4 d-flex flex-row align-content-start">
                    <p class="post_comment fw-medium w-100">{!! $notification->like->post->comment !!}</p>
                </div>
                @if($notification->like->post->photo)
                    <div class="d-flex flex-row justify-content-center"><img src="{{ asset('storage/img/upload/posts/' . $notification->like->post->photo) }}" class="w-100 rounded-3 border"></div>
                @endif
                <hr>
                <div class="d-flex flex-row flex-nowrap align-content-center justify-content-between align-items-center;">
                    <div class="likes">
                        @if($notification->like->post->likedUsers->contains('id', Auth::user()->id))
                            <button class="border border-0 p-0 m-0 bg-transparent">
                                <div class="likes border bg-dark rounded-4 d-flex flex-row align-items-center">
                                    <img src="/img/yes_like.png" class="ms-2">
                                    <p class="text-muted mb-0 ms-1">{{ $notification->like->post->likes }}</p>
                                </div>
                            </button>
                        @else
                            <button class="border border-0 p-0 m-0 bg-transparent">
                                <div class="likes border bg-dark rounded-4 d-flex flex-row align-items-center">
                                    <img src="/img/no_like.png" class="ms-2">
                                    <p class="text-muted mb-0 ms-1">{{ $notification->like->post->likes }}</p>
                                </div>
                            </button>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
