<div>
    @foreach($posts as $post)
        <div class="p-5 mb-3 bg-body-tertiary rounded-3">
            <div class="heder_post d-flex flex-row flex-nowrap align-content-center justify-content-between">
                <div class="info_user_post d-flex flex-row flex-nowrap align-items-start">
                    <div class="user_post_avatar"><img src="{{ asset('storage/img/upload/user/' . $post->user->photo) }}"></div>
                    <div class="user_post_info d-flex flex-column flex-nowrap align-content-start justify-content-center align-items-start ms-2">
                        <p class="info_post_name mb-0 fs-6 fw-semibold">{{ $post->user->name.' '.$post->user->lastname }}</p>
                        <p class="info_post_created mb-0 fw-semibold text-muted">{{ $post->updated_at }}</p>
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->id == $post->user_id)
                    <div class="post_controller">
                        <button wire:click="deletePost({{ $post->id }})" class="border border-0 bg-transparent rounded-4 p-2"><img src="/img/del_post.png"></button>
                    </div>
                @endif
            </div>
            <div class="mt-4 d-flex flex-row align-content-start">
                <p class="post_comment fw-medium w-100">{!! $post->comment !!}</p>
            </div>
            @if($post->photo)
                <div class="d-flex flex-row justify-content-center"><img src="{{ asset('storage/img/upload/posts/' . $post->photo) }}" class="w-100 rounded-3 border"></div>
            @endif
            <hr>
            <div class="d-flex flex-row flex-nowrap align-content-center justify-content-between align-items-center;">
                <div class="likes">
                    @if($post->likedUsers->contains('id', Auth::user()->id))
                        <button wire:click="removeLike({{ $post->id }})" class="border border-0 p-0 m-0 bg-transparent">
                            <div class="likes border bg-dark rounded-4 d-flex flex-row align-items-center">
                                <img src="/img/yes_like.png" class="ms-2">
                                <p class="text-muted mb-0 ms-1">{{ $post->likes }}</p>
                            </div>
                        </button>
                    @else
                        <button wire:click="addLike({{ $post->id }})" class="border border-0 p-0 m-0 bg-transparent">
                            <div class="likes border bg-dark rounded-4 d-flex flex-row align-items-center">
                                <img src="/img/no_like.png" class="ms-2">
                                <p class="text-muted mb-0 ms-1">{{ $post->likes }}</p>
                            </div>
                        </button>
                    @endif
                </div>
                @if(!$post->likedUsers->isEmpty())
                    <button type="button" class="d-flex flex-row flex-nowrap align-content-center align-items-center border rounded-4 p-1 bg-dark" data-bs-toggle="modal" data-bs-target="#modal_post_{{$post->id}}">
                        <p class="text-muted me-2 mb-0 ms-2">Оценили:</p>
                        @foreach($post->likedUsers->take(5) as $user)
                            <img src="{{ asset('storage/img/upload/user/' . $user->photo) }}" width="20px" height="20px" class="border rounded-5" title="{{$user->name}} {{$user->lastname }}">
                        @endforeach
                    </button>
                @endif
            </div>
            @include('profile.include.modalLikers')
        </div>
    @endforeach
    @if(count($posts) < $totalPostsCount)
        <div class="d-flex flex-column align-items-center justify-content-center mb-3">
            <button wire:click="loadMore" class="btn btn-outline-light w-100">Загрузить еще</button>
        </div>
        @endif
        </div>
