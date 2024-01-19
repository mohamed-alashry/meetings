<div class="col-xl-2 col-lg-4 col-md-12 col-sm-12">
    <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4 btn-bg-color-1"
        wire:click="toggleCreateModal">
        <i class="fa-solid fa-user-plus"></i>
        New Invitee
    </button>
    @if ($createModal)
    <div class="modal fade show bg-dark bg-opacity-50" id="createModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 55%;">
            <div class="modal-content rounded-4" style="height: fit-content;">
                <div class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white"
                    style="height: 10rem;">
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">
                        Add a New Invitee
                    </h3>
                    <p class="mb-1 fw-light text-white-50">New Invitee </p>
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
                            <div class="col-xl-3 col-sm-12 px-lg-2 p-0">
                                <button type="button"
                                    class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold btn-color-2"
                                    wire:click="cancel">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                                <button type="button" wire:click="addInvitee"
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
</div>