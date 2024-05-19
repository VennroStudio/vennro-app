<div class="modal fade" id="modal_post_{{$notification->like->post->id}}" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <p>Пост: {{$notification->like->post->comment}}</p>
                <p>Лайки: {{$notification->like->post->likes}}</p>
            </div>
        </div>
    </div>
</div>
