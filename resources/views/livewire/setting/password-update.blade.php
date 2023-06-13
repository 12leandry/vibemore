<div class="main-content bg-lightblue theme-dark-bg right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a href="{{route('setting')}}" class="d-inline-block mt-2"><i class="material-icons font-sm text-white">arrow_backward</i></a>
                        <h4 class="font-xs text-white fw-600 me-4 mb-0 mt-2">Change Password</h4>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                            @endforeach
                            <form wire:submit.prevent="save">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-gorup">
                                            <label class="mont-font fw-600 font-xssss">Current Password</label>
                                            <input type="password" name="new_password"
                                                wire:model.lazy="existing_password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <div class="form-gorup">
                                            <label class="mont-font fw-600 font-xssss">Change Password</label>
                                            <input type="password" name="password" wire:model.lazy="password"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-gorup">
                                            <label class="mont-font fw-600 font-xssss">Confirm Change Password</label>
                                            <input type="password" name="password_confirmation"
                                                wire:model.lazy="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-0">
                                        <button type="submit"
                                            class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
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
