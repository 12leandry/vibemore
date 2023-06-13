@extends('layouts.guest')

@section('title')
    register
@endsection

@section('content')
    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">
                <i class="material-icons text-success display1-size me-2 ms-0">electric_bolt</i>
                <span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xl logo-text mb-0">Vibe Now.
                </span>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i
                        class="material-icons text-grey-900 font-sm btn-round-md bg-greylight">login</i></a>
                <a href="#" class="me-2  mob-menu"><i
                        class="material-icons text-grey-900 font-sm btn-round-md bg-greylight">sign-up</i></a>
                <button class="nav-menu me-0 ms-2"></button>

                <a href="{{ route('login') }}"
                    class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl">{{ __('Login') }}</a>
                <a href="{{ route('register') }}"
                    class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl">{{ __('Register') }}</a>

            </div>


        </div>

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat"
                style="background-image: url(images/login-bg-2.jpg);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <br><br><br>
                        <h2 class="fw-700 display1-size display2-md-size mb-4 text-current">Create your account</h2>
                        <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group icon-input mb-3">
                                <i class="material-icons">person</i>
                                <input type="text"
                                    class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('name') is-invalid @enderror"
                                    placeholder="Enter Your name" name="name" value="{{ old('name') }}" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="material-icons">email</i>
                                <input type="email" id="email"
                                    class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 @error('email') is-invalid @enderror"
                                    placeholder="Enter Your Email Address" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 custom-file form-group">


                                <input id="profile" class="custom-file-input  @error('profile') is-invalid @enderror"
                                    type="file" required name="profile">
                                <label for="profile" class="custom-file-label">Profile</label>

                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <label for="">Gender</label><br>
                            <div class="mb-2 form-check form-check-inline">
                                <input id="gender" class="form-check-input @error('gender') is-invalid @enderror"
                                    type="radio" required name="gender" value="male">
                                <label for="gender" class="form-check-label">Male</label>

                            </div>
                            <div class="mb-2 form-check form-check-inline">

                                <input id="gender" class="form-check-input @error('gender') is-invalid @enderror"
                                    type="radio" required name="gender" value="female">
                                <label for="gender" class="form-check-label">Female</label>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group icon-input mb-1">
                                <i class="material-icons">lock_outline</i>
                                <input type="Password" id="password"
                                    class="style2-input ps-5 form-control text-grey-900 font-xss ls-3
                                        @error('password') is-invalid @enderror "
                                    name="password" required autocomplete="new-password" placeholder="Enter Your Password "
                                    autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                            <div class="form-group icon-input mb-1">
                                <i class="material-icons">lock_outline</i>
                                <input type="Password" id="password-confirm"
                                    class="style2-input ps-5 form-control text-grey-900 font-xss ls-3
                                        @error('password-confirm') is-invalid @enderror"
                                    name="password_confirmation" required autocomplete="password"
                                    placeholder="Confirm Your Password">
                                @error('password-confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="mb-3 text-left form-check">
                                <input type="checkbox" required name="terms" class="mt-2 form-check-input"
                                    id="exampleCheck2">
                                <label class="form-check-label font-xsss text-dark -500" for="exampleCheck2">Accept Term
                                    and Conditions</label>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit"
                                        class="form-control text-center style2-input text-white fw-600 bg-current border-0 p-0 ">{{ __('Register') }}</button>
                                </div>
                                <h6 class="text-black-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a
                                        href="{{ route('login') }}" class="fw-700 ms-1">{{ __('Login') }}</a></h6>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
