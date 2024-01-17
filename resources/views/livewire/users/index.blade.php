<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="line-bookings row mb-3 px-1 g-3">
            <span class="col-xl-10 col-lg-8 col-md-12 col-sm-12">
                <h5 class="card-title">User Managment</h5>
                <p class="card-text">Add or Edit Users</p>
            </span>
            <livewire-users.create :createModal key='create'>
            <span >


                    @if ($updateModal)
                    <div class="modal fade show bg-dark bg-opacity-50" id="updateModal" tabindex="-1"
                        aria-labelledby="updateModalLabel" style="display: block;" aria-modal="true" role="dialog">
                        <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 55%;">
                            <div class="modal-content rounded-4" style="height: fit-content;">
                                <div class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white"
                                    style="height: 10rem;">
                                    <h3 class="modal-title fs-5" id="staticBackdropLabel">
                                        {{ $user->name }}
                                    </h3>
                                    <p class="mb-1 fw-light text-white-50">Update User</p>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" class="w-100 px-2">
                                        <div class="row justify-content-center">
                                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                                <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                                <input
                                                    class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                    placeholder="Full Name." type="text" wire:model="form.name">
                                                @error('form.name')
                                                <b class="text-danger">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                                <i class="fa-solid fa-envelope icon fa-lg mt-3"></i>
                                                <input
                                                    class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                    placeholder="Type here email" type="email" wire:model="form.email">
                                                @error('form.email')
                                                <b class="text-danger">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                                <i class="fa-solid fa-lock icon fa-lg mt-3"></i>
                                                <input
                                                    class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                    placeholder="Type here password" type="password"
                                                    wire:model="form.password" autocomplete="new-password">
                                                @error('form.password')
                                                <b class="text-danger">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                                <i class="fa-solid fa-lock icon fa-lg mt-3"></i>
                                                <input
                                                    class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                                    placeholder="password confirmation" type="password"
                                                    wire:model="form.password_confirmation" autocomplete="new-password">
                                                @error('form.password_confirmation')
                                                <b class="text-danger">{{ $message }}</b>
                                                @enderror
                                            </div>
                                            <div class="col-xl-3 col-sm-12 px-lg-2 p-0">
                                                <button type="button"
                                                    class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold"
                                                    wire:click="toggleUpdateModal" style="color: #5E1042">
                                                    Cancel
                                                </button>
                                            </div>
                                            <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                                                <button type="button" wire:click="updateUser"
                                                    class="btn my-3 w-100 shadow text-white fs-5 rounded-4  fw-bold"
                                                    style="background: #5E1042; padding-top: 0.8rem; padding-bottom: 0.8rem;">
                                                    <i class="fa-solid fa-check fa-fw fa-lg"></i>
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
            </span>
        </div>
    </div>
    <div class="col-12 table-responsive-lg">
        <table class="table rounded-4 shadow">
            <thead class="table-dark rounded-top-4">
                <tr class="border-white border-opacity-10 text-center">
                    <th class="rounded-top-4 border-1 border-start-0 rounded-end-0 py-3" scope="col">
                        User ID
                    </th>
                    <th class="py-3 border-1" scope="col">User Name</th>
                    <th class="py-3 border-1" scope="col">User Emaill</th>
                    <th class="py-3 border-1" scope="col">Date Added</th>
                    <th class="rounded-top-4 rounded-start-0 py-3" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                @if ($loop->last)
                <tr class="end-line-tebal">
                    <td class="align-middle border-1 border-bottom-0 border-start-0 rounded-bottom-4 rounded-end-0"
                        scope="col">
                        {{ $user->id }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $user->name }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $user->email }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0" scope="col">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="align-middle border-1 border-bottom-0 border-end-0 rounded-bottom-4 rounded-start-0"
                        scope="col">
                        <button type="button" class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            Delete
                        </button>
                        <button type="button" class="btn text-white fw-bold m-1 shadow-sm btn-bg-color-2"
                            wire:click="editUser({{ $user->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                    </td>
                </tr>
                @else
                <tr>
                    <td class="align-middle border-1 border-start-0 " scope="row">
                        {{ $user->id }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $user->name }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $user->email }}
                    </td>
                    <td class="align-middle border-1" scope="col">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="align-middle border-1 border-end-0" scope="col">
                        <button type="button" class="btn fw-bold bg-white m-1 shadow-sm btn-color-2">
                            Delete
                        </button>
                        <button type="button" class="btn text-white fw-bold m-1 shadow-sm btn-bg-color-2"
                            wire:click="editUser({{ $user->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
