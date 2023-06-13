<div class="main-content right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row">
                <div class="col-xl-12">
                    <div class="mt-3 mb-3 overflow-hidden border-0 card w-100 shadow-xss rounded-xxl">
                        <div class="card-body position-relative h240 bg-image-cover bg-image-center"
                            style="background-image: url({{ $user->thumbnial ? asset('storage') . '/' . $user->thumbnial : asset('images') . '/' . 'bb-9.jpg' }});">
                        </div>
                        <div class="card-body d-block pt-4 text-center position-relative">
                            <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 ms-auto me-auto">
                                <img src="{{ $user->profile ? asset('storage') . '/' . $user->profile : config('app.url') . '/' . 'images/pt-1.jpg' }}"
                                    alt="image" class="p-1 bg-white rounded-xl w-100">
                            </figure>

                            <h4 class="font-xs ls-1 fw-700 text-grey-900">{{ $user->name }} <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"> @
                                    {{ $user->name }}</span></h4>
                            <div class="d-flex align-items-center pt-0 position-absolute left-15 top-10 mt-4 ms-2">
                                <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 ms-2 me-2"><b
                                        class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">
                                        {{ App\Models\Post::where('user_id', $user->id)->count() ?? 0 }}
                                    </b> Posts
                                </h4>
                                <h4 class="font-xsssss text-center d-none d-lg-block text-grey-500 fw-600 ms-2 me-2"><b
                                        class="text-grey-900 mb-1 font-sm fw-700 d-inline-block ls-3 text-dark">
                                        {{ App\Models\Friend::where(['user_id' => $user->id, 'status' => 'appected'])->orWhere(['friend_id' => $user->id, 'status' => 'appected'])->count() ?? 0 }}

                                    </b> Friends</h4>

                            </div>
                            <div
                                class="d-flex align-items-center justify-content-center position-absolute right-15 top-10 mt-2 me-2">

                                @if (auth()->id() == $user->id)
                                    <a href="#"
                                        class="p-3 text-white bg-primary d-none d-lg-block z-index-1 rounded-3 font-xsssss text-uppercase fw-700 ls-3">Edit</a>
                                @elseif (App\Models\Friend::Where([
                                        'friend_id' => auth()->id(),
                                        'user_id' => $user->id,
                                        'status' => 'pending',
                                    ])->exists())
                                    <button wire:click="acceptfriend('{{ $user->id }}')"
                                        class="p-3 text-white bg-primary d-none d-lg-block z-index-1 rounded-3 font-xsssss text-uppercase fw-700 ls-3">Confirm</button>
                                @elseif (App\Models\Friend::Where([
                                        'friend_id' => $user->id,
                                        'user_id' => auth()->id(),
                                        'status' => 'pending',
                                    ])->exists())
                                    <button wire:click="removefriend('{{ $user->uuid }}')"
                                        class="p-3 text-white bg-warning d-none d-lg-block z-index-1 rounded-3 font-xsssss text-uppercase fw-700 ls-3">CANCEL</button>
                                @elseif ($user->is_friend() == 'accepted')
                                    <button
                                        class="p-3 text-white bg-info d-none d-lg-block z-index-1 rounded-3 font-xsssss text-uppercase fw-700 ls-3">FRIEND</button>
                                @elseif (App\Models\Friend::Where([
                                        'friend_id' => $user->id,
                                        'user_id' => auth()->id(),
                                        'status' => 'accepted',
                                    ])->exists())
                                    <button
                                        wire:click="removefriend('{{ App\Models\Friend::Where([
                                            'friend_id' => $user->id,
                                            'user_id' => auth()->id(),
                                            'status' => 'accepted',
                                        ])->first()->id }}')"
                                        class="p-3 text-white bg-success d-none d-lg-block z-index-1 rounded-3 font-xsssss text-uppercase fw-700 ls-3">UnFriend</button>
                                @else
                                    <button wire:click="addfriend({{ $user->uuid }})"
                                        class="p-3 text-white bg-success d-none d-lg-block z-index-1 rounded-3 font-xsssss text-uppercase fw-700 ls-3">ADD
                                        FRIEND</button>
                                @endif

                                <a href="#"
                                    class="d-none d-lg-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700"><i
                                        class="material-icons font-md">email</i></a>

                            </div>
                        </div>


                        <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                            <ul class="nav nav-tabs h55 d-flex product-info-tab border-bottom-0 ps-4" id="pills-tab"
                                role="tablist">
                                <li class="active list-inline-item me-5"><a
                                        class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block "
                                        href="#navtabs1" data-toggle="tab" wire:click="toggle">About</a></li>

                                <li class="list-inline-item me-5">
                                    <a class="fw-700 me-sm-5 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block active"
                                        href="#navtabs7" data-toggle="tab">Media
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-block p-4">
                            <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                            <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">{{ $user->description ?? '.....' }}
                            </p>
                        </div>

                        <div class="card-body d-flex pt-0">
                            <i class="material-icons text-grey-500 me-3 font-lg">place</i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $user->location ?? 'cameroon' }} </h4>
                        </div>

                    </div>
                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                            <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-block pt-0 pb-2">
                            <div class="row">
                                @foreach ($post_media as $image)
                                    <div class="col-6 mb-2 pe-1">
                                        <a href="{{ asset('storage') . '/' . $image->file }}" data-lightbox="roadtrip">
                                            <img src=" {{ asset('storage') . '/' . $image->file }}" alt="image"
                                                class="img-fluid rounded-3 w-100">
                                        </a>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="card-body d-block w-100 pt-0">
                            <a href="#"
                                class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i
                                    class="material-icons font-xss me-2">link</i> More</a>
                        </div>
                    </div>



                </div> --}}
                <div class="col-12">



                    @forelse ($posts as $post)
                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <div class="card-body p-0 d-flex">
                                <figure class="avatar ms-3"><img
                                        src={{ asset('storage') . '/' . $post->user->profile }} alt="image"
                                        class="shadow-sm rounded-circle w45"></figure>
                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $post->user->name }}
                                    <span
                                        class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $post->created_at->diffForHumans() }}
                                    </span>
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
                                                <img src="{{ asset('storage') . '/' . $media }}"
                                                    class="rounded-3  h-10" alt="image" width="200%"
                                                    height="100%">

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
                                                <a href="https://videojs.com/html5-video-support/"
                                                    target="_blank">supports HTML5 video</a>
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
                                <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                                        class="material-icons  text-primary btn-round-sm font-lg">share</i><span
                                        class="d-none-xs">Share</span></a>
                                <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg "
                                    aria-labelledby="dropdownMenu21">
                                    <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share <i
                                            class="material-icons text-grey-900 btn-round-md bg-greylight font-xss ">share</i>
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
                                <input type="text" placeholder="write your comments here..." required
                                    name="comment" wire:model.lazy="comment"
                                    class="p-2 border-0 bg-grey text-grey-500 font-xssss lh-32 fw-600 rounded-3 w-100 theme-dark-bg"
                                    id="">
                            </form>
                            {{-- end of like functionalities --}}
                        </div>

                    @empty
                        <h1 class="text-center text-danger">No Post Found !</h1>
                    @endforelse

                    <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                        <div class="snippet mt-2 me-auto ms-auto" data-title=".dot-typing">
                            <div class="stage">
                                <div class="dot-typing"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</div>
