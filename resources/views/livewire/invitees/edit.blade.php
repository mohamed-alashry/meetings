<div>
    <div class="modal fade show bg-dark bg-opacity-50" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
        style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 55%;">
            <div class="modal-content rounded-4" style="height: fit-content;">
                <div class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white"
                    style="height: 10rem;">
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">
                        {{ $invitee->name }}
                    </h3>
                    <p class="mb-1 fw-light text-white-50">Update Invitee</p>
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
                                <button type="button" class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold"
                                    wire:click="cancel" style="color: #5E1042">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                                <button type="button" wire:click="updateInvitee"
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
</div>
