 <div class="p-5 mb-3 bg-body-tertiary rounded-3">
     <form id="postForm" wire:submit.prevent="addPost" enctype="multipart/form-data">
         <input type="hidden" wire:model="user_id">
         <textarea wire:model="comment" class="comment_for_post p-2 border bg-dark rounded-4" onkeydown="handleEnter(event)"></textarea>
         <input type="file" wire:model="photo" id="photoInput" class="file_wall border bg-dark rounded-4">
         <button type="submit" id="submitPost" class="button_send_wall border bg-dark rounded-4"><img src="/img/send.png" class="send_wall"></button>
     </form>
     @if ($photo)
         <div class="d-flex flex-column align-items-center justify-content-center">
             <img id="previewImage" src="{{ $photo->temporaryUrl() }}" alt="Preview" class="previewImage rounded-3 mt-2 mb-3">
             <button type="button" id="removePhotoButton" wire:click="removePhoto" class="btn btn-outline-light">Удалить фото</button>
         </div>
     @endif
    </div>
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


