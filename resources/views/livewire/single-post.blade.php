<div class="main-content right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <!-- loader wrapper -->
            <div class="preloader-wrap p-3">
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="box shimmer mb-3">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
                <div class="box shimmer">
                    <div class="lines">
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                        <div class="line s_shimmer"></div>
                    </div>
                </div>
            </div>
            <!-- loader wrapper -->
            <div class="row feed-body">
                <div class="col-12 ">
                    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                        <div class="p-0 card-body d-flex">
                            <figure class="avatar me-3"><img
                                    src="{{ $post->user->profile ? asset('storage') . '/' . $post->user->profile : 'images/user-7.png' }}"
                                    alt="image" class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="mt-1 fw-700 text-grey-900 font-xssss">{{ $post->user->name }} <span
                                    class="mt-1 d-block font-xssss fw-500 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}</span>
                            </h4>
                            <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown"
                                aria-expanded="false"><i
                                    class="material-icons text-grey-900 btn-round-md bg-greylight font-xss">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                aria-labelledby="dropdownMenu2">
                                <div class="card-body p-0 d-flex">
                                    <i class="material-icons  text-grey-500 ms-3 font-lg">bookmark</i>
                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 ms-4">Save Link <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Add this to
                                            your saved items</span></h4>
                                </div>
                                <div class="card-body p-0 d-flex mt-2">
                                    <i class="material-icons  text-grey-500 ms-3 font-lg">error</i>
                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 ms-4">Hide Post <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                            saved items</span></h4>
                                </div>
                                <div class="card-body p-0 d-flex mt-2">
                                    <i class="material-icons  text-grey-500 ms-3 font-lg">error</i>
                                    <h4 class="fw-600 text-grey-900 font-xssss mt-0 ms-4">Hide all from Group <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                            saved items</span></h4>
                                </div>
                                <div class="card-body p-0 d-flex mt-2">
                                    <i class="material-icons  text-grey-500 ms-3 font-lg">lock</i>
                                    <h4 class="fw-600 mb-0 text-grey-900 font-xssss mt-0 ms-4">Unfollow Group <span
                                            class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500">Save to your
                                            saved items</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 ms-lg-5">
                            <a
                                href="{{ route('single-post', ['useruuid' => $post->user->id, 'postuuid' => $post->uuid]) }}">
                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">{{ $post->content }} </p>
                            </a>
                        </div>

                        {{-- contentPost Start --}}
                        <div class="card-body d-block p-0">
                            <div class="row pe-2 ps-2">
                                @php
                                    $post_media = App\Models\PostMedia::where('post_id', $post->id)->first();

                                @endphp

                                @if ($post_media && $post_media->file_type == 'image')
                                    @php
                                        $media = $post_media->file;
                                    @endphp
                                    <div class=" col-xs-4 col-sm-6 p-2  ">
                                        <a href="{{ asset('storage') . '/' . $media }}" data-lightbox="roadtrip"
                                            class='position-relative d-block'>
                                            <img src="{{ asset('storage') . '/' . $media }}" class="rounded-3  h-10"
                                                alt="image" width="200%" height="100%">
                                        </a>
                                    </div>
                                @elseif ($post_media && $post_media->file_type == 'video')
                                    <video id="my-video" class="video-js" controls preload="auto" data-setup="{}"
                                        width="100%" height="100%">
                                        <source src="{{ asset('storage') . '/' . $post_media->file }}"
                                            type="video/mp4" />
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5 video</a>
                                        </p>
                                    </video>
                                @endif


                            </div>
                        </div>

                        {{-- content-Post End --}}

                        {{-- Like fonctionalities Start --}}
                        <div class="card-body d-flex p-0 mt-3">
                            {{-- like sectiond --}}
                            @php
                                $like = App\Models\Like::where(['post_id' => $post->id, 'user_id' => auth()->id()])->first();
                            @endphp
                            @if ($like)
                                <a href="#" wire:click.prevent='dislike({{ $post->id }})'
                                    class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss ms-2"><i
                                        class=" material-icons text-primary  me-2 btn-round font-sl">thumb_up</i>
                                    {{ $post->likes ?? 0 }} like
                                </a>
                            @else
                                <a href="#" wire:click.prevent='like({{ $post->id }})'
                                    class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss ms-2"><i
                                        class=" material-icons text-black  me-2 btn-round font-sl">thumb_up</i>
                                    {{ $post->likes ?? 0 }} like
                                </a>
                            @endif
                            {{-- end of like section --}}

                            {{-- comment section start --}}
                            <a href="#"
                                class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                    class="material-icons text-primary  btn-round-sm font-lg">message</i><span
                                    class="d-none-xss">{{ $post->comments }} Comment</span></a>
                            <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false"
                                class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                    class="material-icons  text-primary btn-round-sm font-lg">share</i><span
                                    class="d-none-xs">Share</span></a>
                            <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg "
                                aria-labelledby="dropdownMenu21">
                                <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share
                                    <i class="material-icons text-grey-900 btn-round-md bg-greylight font-xss ">share</i>
                                </h4>
                                <div class="card-body p-0 d-flex">
                                    <ul class="d-flex align-items-center justify-content-between mt-2">
                                        <li><a href="#" class="btn-round-lg bg-pinterest"><i
                                                    class="font-xs ti-pinterest text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-facebook"><i
                                                    class="font-xs ti-facebook text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-twiiter"><i
                                                    class="font-xs ti-twitter-alt text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-linkedin"><i
                                                    class="font-xs ti-linkedin text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-instagram"><i
                                                    class="font-xs ti-instagram text-white"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body p-0 d-flex">
                                    <ul class="d-flex align-items-center justify-content-between mt-2">
                                        <li><a href="#" class="btn-round-lg bg-whatsup"><i
                                                    class="font-xs material-icons text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-tumblr"><i
                                                    class="font-xs ti-tumblr text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-youtube"><i
                                                    class="font-xs ti-youtube text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-flicker"><i
                                                    class="font-xs ti-flickr text-white"></i></a></li>
                                        <li class="me-1"><a href="#" class="btn-round-lg bg-black"><i
                                                    class="font-xs ti-vimeo-alt text-white"></i></a></li>
                                    </ul>
                                </div>
                                <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">
                                    Copy Link</h4>
                                <i
                                    class="material-icons position-absolute left-15 ms-4 mt-3 font-xs text-grey-500">file</i>
                                <input type="text"
                                    value="{{ route('single-post', ['useruuid' => $post->user->uuid, 'postuuid' => $post->uuid]) }}"
                                    class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg">
                            </div>
                        </div>
                        <form method="POST" wire:submit.prevent="saveComment({{ $post->id }})">
                            <input type="text" placeholder="write your comments here..." required name="comment"
                                wire:model.lazy="comment"
                                class="p-2 border-0 bg-grey text-black-500 font-xssss lh-32 fw-600 rounded-3 w-100 theme-dark-bg"
                                id="">
                        </form>

                        {{-- end of like functionalities --}}

                    </div>
                </div>
                @foreach ($post->commentss as $comment)
                        <div class="p-4 mt-3 mb-1  text-center border-0 border-bottom card w-100 shadow-xss rounded-xxl">
                            <div class="p-0 card-body d-flex">
                                <figure class="avatar me-3"><img
                                        src="{{ $comment->user->profile ? asset('storage') . '/' . $comment->user->profile : 'images/user-7.png' }}"
                                        alt="image" class="shadow-sm rounded-circle w45"></figure>
                                <h4 class="mt-1 fw-700 text-grey-900 font-xssss">{{ $comment->user->username }} <span
                                        class="mt-1 d-block font-xssss fw-500 lh-3 text-grey-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </h4>
                                <p class="px-2">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
