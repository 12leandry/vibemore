<form wire:submit.prevent="createpost" class="card w-100 shadow-xss rounded-xxl border-0 pe-4 pt-4 ps-4 pb-3 mb-3">
    <div class="card-body p-0">
        <a href="#" class=" font-xssss fw-600 text-black card-body p-0 d-flex align-items-center">
            <i class="btn-round-sm font-xs text-primary material-icons ms-2 bg-greylight">border_color</i>Create Post
        </a>
    </div>
    <div class="card-body p-0 mt-3 position-relative">
        <figure class="avatar position-absolute me-2 mt-1 top-5"><img
                src="{{ auth()->user()->profile ? asset("storage").'/'.auth()->user()->profile : 'images/user-8.png' }}" alt="image"
                class="shadow-sm rounded-circle w30">
        </figure>
        <textarea wire:model.lazy='content' name="content"
            class="p-2 h100 bor-0 w-100 rounded-xxl ps-5 font-xssss text-black-500 fw-500 border-light-md theme-dark-bg"
            cols="30" rows="10" placeholder="Lorem ipsum dolor sit amet." required>

        </textarea>
    </div>

    @error('content')
        <span class="error">{{ $message }}</span>
    @enderror

    <div wire:loading wire:target='images'>Uploading ........</div>
    <div wire:loading wire:target='video'>Uploading ........</div>

    @if ($images)
        @foreach ($images as $images)
            <img src="{{ $images->temporaryUrl() }}" alt="" width="width:100px; height:100%">
        @endforeach
    @endif
    @if ($video)
        <video src="{{ $video->temporaryUrl() }}" alt="" width="width:100px; height:100%"></video>
        <br>
    @endif


    {{-- styles for photo/video icons  --}}
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>
    {{-- end style --}}

    <div class="card-body d-flex p-0 mt-0">
        <a href="#"
            class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 upload-btn-wrapper"><i
                class="material-icons font-md text-primary me-2">insert_photo</i><span class="d-none-xs">Photo
                <input type="file" multiple id="file" wire:model='images'></span></a>

        <a href="#"
            class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4 upload-btn-wrapper"><i
                class="material-icons font-lg text-primary me-2">videocam</i><span class="d-none-xs">Video
                <input type="file" id="file" wire:model='video'></span></a>


        <button type="submit" style="ontline: none; border: none; border-radius: 43px;"
            class="outline-none ms-auto border-none bg-none">
            <i class="material-icons text-primary btn-round-md  font-xs ">send</i>
        </button>

    </div>
</form>
