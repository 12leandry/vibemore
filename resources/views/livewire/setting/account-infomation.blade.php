<div class="main-content bg-lightblue theme-dark-bg right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a href="{{ route('setting') }}" class="d-inline-block mt-2"><i
                                class="material-icons font-sm text-white">arrow_back</i></a>
                        <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                        <div class="row justify-content-center">
                            <div class="card-body position-relative h240 bg-image-cover bg-image-center"
                                style="background-image: url( {{ auth()->user()->thumbnial ? asset('storage') . '/' . auth()->user()->thumbnial : asset('images') . '/' . 'bb-9.jpg' }});">
                            </div>
                            <div class="col-lg-4 text-center">
                                <figure class="avatar me-auto ms-auto mb-0 mt-2 w100">
                                    <img src="{{ asset('storage') . '/' . auth()->user()->profile }}" alt="image"
                                        class="shadow-sm rounded-3 w-100">
                                </figure>
                                <h2 class="fw-700 font-sm text-grey-900 mt-3">{{ auth()->user()->name }}</h2>
                                <h4 class="text-grey-500 fw-500 mb-3 font-xsss mb-4">@ {{ auth()->user()->name }}</h4>
                                <!-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a> -->
                            </div>
                        </div>

                        <form wire:submit.prevent='updateProfile' enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Name</label>
                                        <input wire:model.lazy="name"type="text" class="form-control"
                                            placeholder="Name" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Email</label>
                                        <input wire:model.lazy="email" disabled type="text" class="form-control"
                                            placeholder="email" value="">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Country</label>
                                        <input wire:model.lazy="country" type="text" class="form-control"
                                            value="" placeholder="country">
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Address</label>
                                        <input wire:model.lazy="address" type="text" class="form-control"
                                            placeholder="address" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="card mt-3 border-0">
                                        <div class="card-body d-flex justify-content-between align-items-end p-0">
                                            <div class="form-group mb-0 w-100">
                                                <input wire:model.lazy='profile' type="file" name="file"
                                                    id="file" class="input-file">
                                                <label for="file"
                                                    class="rounded-3 text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                                    <i class="material-icons large-icon ms-3 d-block">cloud_upload</i>
                                                    <span class="js-fileName">Drag and drop or click to update profile
                                                        image</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div wire:loading wire:target="profile">Uploading ....</div>
                                        @if ($profile)
                                            <img src="{{ $profile->temporaryUrl() }}" alt=""
                                                style="width: 100%;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="card mt-3 border-0">
                                        <div class="card-body d-flex justify-content-between align-items-end p-0">
                                            <div class="form-group mb-0 w-100">
                                                <input wire:model.lazy='thumbnial' type="file" name="thumbnial"
                                                    id="thumbnial" class="input-file">
                                                <label for="thumbnial"
                                                    class="rounded-3 text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                                    <i class="material-icons large-icon ms-3 d-block">cloud_upload</i>
                                                    <span class="js-fileName">Drag and drop or click to update thumbnial
                                                        image</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div wire:loading wire:target="thumbnial">Uploading ....</div>
                                        @if ($thumbnial)
                                            <img src="{{ $thumbnial->temporaryUrl() }}" alt=""
                                                style="width: 100%;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="mont-font fw-600 font-xsss">Description</label>
                                        <textarea wire:model.lazy='description' class="form-control mb-0 p-3 h100 bg-greylight lh-16" rows="5"
                                            placeholder="Write your message..." spellcheck="false"></textarea>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit"
                                            class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- <div class="card w-100 border-0 p-2"></div> -->
            </div>
        </div>

    </div>
</div>
