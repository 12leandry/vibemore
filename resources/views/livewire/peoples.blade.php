<div class="main-content right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left ps-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <div class="card-body d-flex align-items-center p-0">
                            <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Explore</h2>
                            <div class="search-form-2 ms-auto">
                                <input type="search" wire:model='search'
                                    class="form-control text-black-500 mb-0 bg-greylight theme-dark-bg border-0"
                                    placeholder="Search here.">
                                <i class="material-icons font-sl  ms-auto float-right text-primary"
                                    style="margin-right: -8px; padd">search</i>

                            </div>
                            {{-- <a href="#" class="btn-round-md me-2 bg-greylight theme-dark-bg rounded-3"><i class="material-icons font-xs text-primary">filter_alt</i></a> --}}
                        </div>
                    </div>

                    <div class="row pe-2 ps-2">
                        @forelse ($users as $user)
                            <div class="col-md-3 col-sm-4 ps-2 pe-2">
                                <div class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3">
                                    <div class="card-body d-block w-100 pe-3 ps-3 pb-4 text-center">
                                        <figure class="avatar me-auto ms-auto mb-0 position-relative w65 z-index-1"><img
                                                src="{{ asset('storage') . '/' . $user->profile }}" alt="image"
                                                class="float-right p-0 bg-white rounded-circle w-100 shadow-xss">
                                        </figure><br><br><br>
                                        <div class="clearfix"></div>
                                        <h4 class="fw-700 font-xsss mt-3 mb-1"> <a
                                            href="{{ route('user', $user->uuid) }}">{{ $user->name }}</a> </h4>
                                        <small class="fw-500 font-xsssss text-grey-500 mt-0 mb-3"> @
                                            {{ $user->name }}</small><br>
                                        {{-- {{dd($user->is_friend())}} --}}
                                        @if (App\Models\Friend::Where([
                                                'friend_id' => auth()->id(),
                                                'user_id' => $user->id,
                                                'status' => 'pending',
                                            ])->exists())
                                            <button wire:click="acceptfriend('{{ $user->id }}')"
                                                class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 d-inline-block rounded-xl bg-primary font-xsssss fw-700 ls-lg text-white">ACCEPT
                                            </button>
                                        @elseif (App\Models\Friend::Where([
                                                'friend_id' => $user->id,
                                                'user_id' => auth()->id(),
                                                'status' => 'pending',
                                            ])->exists())
                                            <button wire:click="removefriend('{{ $user->id }}')"
                                                class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 d-inline-block rounded-xl bg-warning font-xsssss fw-700 ls-lg text-white">CANCEL
                                            </button>
                                        @elseif (App\Models\Friend::Where([
                                                'friend_id' => auth()->id(),
                                                'user_id' => $user->id,
                                                'status' => 'rejected',
                                            ])->exists())
                                            <button wire:click="addfriend('{{ $user->id }}')"
                                                class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">ADD
                                                FRIEND
                                            </button>
                                        @elseif ($user->is_friend() == 'accepted')
                                            <button
                                                class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 d-inline-block rounded-xl bg-info font-xsssss fw-700 ls-lg text-white">FRIEND
                                            </button>
                                        @else
                                            <button wire:click="addfriend('{{ $user->id }}')"
                                                class="mt-0 btn pt-2 pb-2 pe-3 ps-3 lh-24 me-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">ADD
                                                FRIEND
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-center text-danger">No User Found</h4>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
