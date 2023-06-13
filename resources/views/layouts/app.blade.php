<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vibe Now') }}</title>
    <link rel="stylesheet" href=" {{ asset('css/feather.css') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/emoji.css') }}">


    <link rel="stylesheet" href=" {{ asset('css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video-player.css') }}">
    <link rel="stylesheet"
        type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @livewireStyles
</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    <div class="main-wrapper">

        <!-- navigation top-->
        @include('layouts.navigation')
        <!-- navigation top -->

        <!-- navigation left -->
        @include('layouts.left-navigation')
        <!-- navigation left -->
        <!-- main content -->

            {{ $slot  ?? ''}}


        <!-- main content -->

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-5 right-scroll">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

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

                <div class="section full ps-3 pe-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning me-auto btn-round-xss"></span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-4.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill ps-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-3.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill ps-0 font-xsssss">2 days</span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-2.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 ms-2">
                                <img src="../images/user-12.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>

                    </ul>
                </div>
                <div class="section full ps-3 pe-4 pt-4 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                    <ul class="list-group list-group-flush">
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">

                            <span
                                class="btn-round-sm bg-primary-gradiant ms-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Studio Express</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill ps-0 font-xsssss">2 min</span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">

                            <span
                                class="btn-round-sm bg-gold-gradiant ms-3 ls-3 text-white font-xssss fw-700">AR</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Armany Design</a>
                            </h3>
                            <span class="bg-warning me-auto btn-round-xss"></span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">

                            <span
                                class="btn-round-sm bg-mini-gradiant ms-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">De fabous</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
                <div class="section full ps-3 pe-4 pt-0 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                    <ul class="list-group list-group-flush">
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">

                            <span
                                class="btn-round-sm bg-primary-gradiant ms-3 ls-3 text-white font-xssss fw-700">AB</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Armany Seary</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>
                        <li
                            class="bg-transparent list-group-item no-icon ps-0 pe-0 pt-2 pb-2 border-0 d-flex align-items-center">

                            <span
                                class="btn-round-sm bg-gold-gradiant ms-3 ls-3 text-white font-xssss fw-700">SD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat"
                                    href="#">Entropio Inc</a>
                            </h3>
                            <span class="bg-success me-auto btn-round-xss"></span>
                        </li>

                    </ul>
                </div>

            </div>
        </div>


        <!-- right chat -->

        <div class="app-footer border-0 shadow-lg bg-primary-gradiant">
            <a href="default.html" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
            <a href="default-video.html" class="nav-content-bttn"><i class="feather-package"></i></a>
            <a href="default-live-stream.html" class="nav-content-bttn" data-tab="chats"><i
                    class="feather-layout"></i></a>
            <a href="shop-2.html" class="nav-content-bttn"><i class="feather-layers"></i></a>
            <a href="default-settings.html" class="nav-content-bttn"><img src="../images/female-profile.png"
                    alt="user" class="w30 shadow-xss"></a>
        </div>

        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated"
                            aria-label="search outline"></ion-icon>
                    </i>
                    <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>

    </div>
    @foreach (App\Models\Story::where('created_at', '>=', now()->subDay())->latest()->get()->unique('user_id') as $story)
        <div class="modal bottom side fade" id="{{ $story->user->uuid }}" tabindex="-1" role="dialog"
            style=" overflow-y: auto;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="bg-transparent border-0 modal-content">
                    <button type="button" class="mt-0 close position-absolute top--30 right--10"
                        data-dismiss="modal" aria-label="Close"><i class=" text-grey-900 font-xssss">X</i></button>
                    <div class="p-0 modal-body">
                        <div class="overflow-hidden border-0 card w-100 rounded-3 bg-gradiant-bottom bg-gradiant-top">
                            <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">

                                <div class="item"><img src="{{ asset('storage') . '/' . $story }}" alt="image">
                                </div>

                            </div>
                        </div>
                        <div class="bottom-0 p-3 mt-3 mb-0 form-group position-absolute z-index-1 w-100">
                            <input type="text"
                                class="p-3 text-white bg-transparent style2-input w-100 border-light-md pe-5 font-xssss fw-500"
                                value="Write Comments">
                            <span class="text-white font-md position-absolute" style="bottom: 35px;right:30px;"><i
                                    class="material-icons">send</i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="{{ asset('js/plugin.js') }}"></script>

    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/video-player.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @livewireScripts

    <script>
        window.addEventListener('toastr:success', event => {
            toastr.success(event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>

</body>

</html>
