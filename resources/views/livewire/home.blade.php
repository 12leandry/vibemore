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
                <div class="col-xl-8 col-xxl-9 col-lg-8">





                    @livewire('components.stories')
                    @livewire('components.create-post')


                    {{-- post page --}}
                    @forelse ($posts as $post)
                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <div class="card-body p-0 d-flex">
                                <figure class="avatar ms-3"><img src={{ asset('storage') . '/' . $post->user->profile }}
                                        alt="image" class="shadow-sm rounded-circle w45"></figure>
                                <h4 class="mt-1 fw-700 text-grey-900 font-xssss"> <a
                                        href="{{ route('user', $post->user->uuid) }}">{{ $post->user->name }}</a>
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
                                <a href="#" id="dropdownMenu21" data-bs-toggle="dropdown" aria-expanded="false"
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

                {{-- end of post-page --}}

                <div class="col-xl-4 col-xxl-3 col-lg-4 pe-lg-0">
                    @if (count($friend_request))
                        <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                            <div class="card-body d-flex align-items-center p-4">
                                <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friend Request</h4>
                                <a href="{{ route('explore') }}" class="fw-600 me-auto font-xssss text-primary">See
                                    all</a>
                            </div>
                            @forelse ($friend_request as $user)
                                <div class="card-body d-flex pt-4 pe-4 ps-4 pb-0 border-top-xs bor-0">
                                    <figure class="avatar ms-3">
                                        <img src="{{ asset('storage') . '/' . $user->user->profile }}" alt="image"
                                            class="shadow-sm rounded-circle w45">
                                    </figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $user->user->name }}
                                        <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual
                                            friends
                                        </span>
                                    </h4>
                                </div>
                                <div class="card-body d-flex align-items-center pt-0 pe-4 ps-4 pb-4">
                                    <button wire:click='acceptfriend({{ $user->user_id }})'
                                        class="p-2 lh-20 w100 bg-primary-gradiant ms-2 text-white text-center font-xssss fw-600 ls-1 rounded-xl">Confirm</button>
                                    <button wire:click='rejectfriend({{ $user->user_id }})'
                                        class="p-2 lh-20 w100 bg-grey text-grey-800 text-center font-xssss fw-600 ls-1 rounded-xl">Delete</button>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    @endif


                    <div class="card w-100 shadow-xss rounded-xxl border-0 p-0 ">
                        <div class="card-body d-flex align-items-center p-4 mb-0">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Confirm Friend</h4>
                            <a href="default-member.html" class="fw-600 me-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body bg-transparent-card d-flex p-3 bg-greylight me-3 ms-3 rounded-3">
                            <figure class="avatar ms-2 mb-0"><img src="../images/user-7.png" alt="image"
                                    class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Anthony Daugloi <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                            </h4>
                            <a href="#"
                                class="btn-round-sm bg-white text-grey-900 material-icons-chevron-right font-xss me-auto mt-2"></a>
                        </div>
                        <div class="card-body bg-transparent-card d-flex p-3 bg-greylight m-3 rounded-3"
                            style="margin-bottom: 0 !important;">
                            <figure class="avatar ms-2 mb-0"><img src="../images/user-8.png" alt="image"
                                    class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2"> David Agfree <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                            </h4>
                            <a href="#"
                                class="btn-round-sm bg-white text-grey-900 material-icons-plus font-xss me-auto mt-2"></a>
                        </div>
                        <div class="card-body bg-transparent-card d-flex p-3 bg-greylight m-3 rounded-3">
                            <figure class="avatar ms-2 mb-0"><img src="../images/user-12.png" alt="image"
                                    class="shadow-sm rounded-circle w45"></figure>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Hugury Daugloi <span
                                    class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">12 mutual friends</span>
                            </h4>
                            <a href="#"
                                class="btn-round-sm bg-white text-grey-900 material-icons-plus font-xss me-auto mt-2"></a>
                        </div>

                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                        <div class="card-body d-flex align-items-center p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggest Group</h4>
                            <a href="default-group.html" class="fw-600 me-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-4 pe-4 ps-4 pb-0 overflow-hidden border-top-xs bor-0">
                            <img src="../images/e-2.jpg" alt="img" class="img-fluid rounded-xxl mb-2">
                        </div>
                        <div class="card-body dd-block pt-0 pe-4 ps-4 pb-4">
                            <ul class="memberlist mt-1 mb-2 me-0 d-block">
                                <li class="w20"><a href="#"><img src="../images/user-6.png" alt="user"
                                            class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                <li class="w20"><a href="#"><img src="../images/user-7.png" alt="user"
                                            class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                <li class="w20"><a href="#"><img src="../images/user-8.png" alt="user"
                                            class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                <li class="w20"><a href="#"><img src="../images/user-3.png" alt="user"
                                            class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                <li class="last-member"><a href="#"
                                        class="bg-greylight fw-600 text-grey-500 font-xssss w35 ls-3 text-center"
                                        style="height: 35px; line-height: 35px;">+2</a></li>
                                <li class="ps-3 w-auto me-1"><a href="#"
                                        class="fw-600 text-grey-500 font-xssss">Member
                                        apply</a></li>
                            </ul>
                        </div>



                    </div>

                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Suggest Pages</h4>
                            <a href="default-group.html" class="fw-600 me-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-4 pe-4 ps-4 pb-0 overflow-hidden border-top-xs bor-0">
                            <img src="../images/g-2.jpg" alt="img" class="img-fluid rounded-xxl mb-2">
                        </div>
                        <div class="card-body d-flex align-items-center pt-0 pe-4 ps-4 pb-4">
                            <a href="#"
                                class="p-2 lh-28 w-100 bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i
                                    class="material-icons-external-link font-xss ms-2"></i> Like Page</a>
                        </div>

                        <div class="card-body d-flex pt-0 pe-4 ps-4 pb-0 overflow-hidden">
                            <img src="../images/g-3.jpg" alt="img"
                                class="img-fluid rounded-xxl mb-2 bg-lightblue">
                        </div>
                        <div class="card-body d-flex align-items-center pt-0 pe-4 ps-4 pb-4">
                            <a href="#"
                                class="p-2 lh-28 w-100 bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i
                                    class="material-icons-external-link font-xss ms-2"></i> Like Page</a>
                        </div>


                    </div>


                    <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                        <div class="card-body d-flex align-items-center  p-4">
                            <h4 class="fw-700 mb-0 font-xssss text-grey-900">Event</h4>
                            <a href="default-event.html" class="fw-600 me-auto font-xssss text-primary">See all</a>
                        </div>
                        <div class="card-body d-flex pt-0 pe-4 ps-4 pb-3 overflow-hidden">
                            <div class="bg-success ms-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24
                                    new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 pe-4 ps-4 pb-3 overflow-hidden">
                            <div class="bg-warning ms-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24
                                    new work, NY 10010</span> </h4>
                        </div>

                        <div class="card-body d-flex pt-0 pe-4 ps-4 pb-3 overflow-hidden">
                            <div class="bg-primary ms-2 p-3 rounded-xxl">
                                <h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span
                                        class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4>
                            </div>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span
                                    class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24
                                    new work, NY 10010</span> </h4>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
