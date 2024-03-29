<div class="col-xl-2 col-lg-4 col-md-12 col-sm-12">
    @if (hasPermissionUser('create_user'))
    <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4 btn-bg-color-1"
        wire:click="toggleCreateModal">
        <i class="fa-solid fa-user-plus"></i>
        New User
    </button>
    @if ($createModal)
    <div class="modal fade show bg-dark bg-opacity-50" id="createModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 55%;">
            <div class="modal-content rounded-4" style="height: fit-content;">
                <div class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white"
                    style="height: 10rem;">
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">
                        Add a New User
                    </h3>
                    <p class="mb-1 fw-light text-white-50">New User </p>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="w-100 px-2">
                        <div class="row justify-content-center">
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Full Name." type="text" wire:model="name">
                                @error('name')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-envelope icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Type here email" type="email" wire:model="email">
                                @error('email')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-lock icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Type here password" type="password" wire:model="password">
                                @error('password')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-lock icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="password confirmation" type="password"
                                    wire:model="password_confirmation">
                                @error('password_confirmation')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-12 col-sm-12">
                                <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Role Name." type="text" wire:model="role_name">
                                @error('role_name')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="col-12 row">
                                <h3>@lang('permissions.plural')</h3>
                                @foreach (config('user_permissions') as $key => $list)
                                <div class="col-12">

                                    <div class="row border border-2 my-2 py-2">
                                        <div class="col-12">
                                            <h5>@lang('permissions.' . $key)</h5>
                                        </div>
                                        @foreach ($list as $index => $item)
                                        <div class="col-3 my-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model="permissions.{{ $item }}" value="{{ $item }}"
                                                    id="{{ $item }}">
                                                <label class="form-check-label" for="{{ $item }}">
                                                    @lang('permissions.' . $item)
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-xl-3 col-sm-12 px-lg-2 p-0">
                                <button type="button"
                                    class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold btn-color-2"
                                    wire:click="cancel">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                                <button type="button" wire:click="addUser"
                                    class="btn my-3 w-100 shadow text-white fs-6 rounded-4 py-3 fw-bold btn-bg-color-2">
                                    <i class="fa-solid fa-check fa-fw fa-lg"></i>
                                    Add Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>
