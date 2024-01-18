<div class="col-xl-2 col-lg-4 col-md-12 col-sm-12">
    <button type="button" class="btn text-light fw-bold shadow-sm w-100 h-100 rounded-4 btn-bg-color-1"
        wire:click="toggleCreateModal">
        <i class="fa-solid fa-user-plus"></i>
        New Room
    </button>
    @if ($createModal)
    <div class="modal fade show bg-dark bg-opacity-50" id="createModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog ps-2 d-flex justify-content-end" style="max-width: 55%;">
            <div class="modal-content rounded-4" style="height: fit-content;">
                <div class="modal-header rounded-top-4 flex-column align-items-start justify-content-center background-primary text-white"
                    style="height: 10rem;">
                    <h3 class="modal-title fs-5" id="staticBackdropLabel">
                        Add a New Room
                    </h3>
                    <p class="mb-1 fw-light text-white-50">New Room </p>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="w-100 px-2">

                        <div class="row justify-content-center">
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Room Name." type="text" wire:model="name">
                                @error('name')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-envelope icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Room Location" type="text" wire:model="location">
                                @error('location')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-circle-user icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Room Capacity." type="number" wire:model="capacity">
                                @error('capacity')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login px-lg-2 p-0 col-xl-6 col-sm-12">
                                <i class="fa-solid fa-envelope icon fa-lg mt-3"></i>
                                <input class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                                    placeholder="Room Location" type="text" wire:model="google_location">
                                @error('google_location')
                                <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="input-form-login border shadow rounded-4 mx-0 border p-0 col-12">
                                <label for="finput1" class="w-100">
                                    <i class="fa-solid fa-file-export icon fa-lg">
                                    </i>
                                    <samp class="text-input px-5 py-3 position-absolute text-body-secondary">
                                        Upload Photos here...
                                    </samp>
                                    <input class="form-control py-3 opacity-0" type="file" multiple="true"
                                        accept="image/*" id="finput1" wire:model="photos">
                                </label>
                                @error('photos.*') <b class="text-danger">{{ $message }}</b> @enderror
                            </div>
                            <div class="col-12">
                                <div class="row m-2 g-2">
                                    @if (count($photos) > 0)
                                    @foreach ($photos as $index => $photo)
                                    <div class="col-lg-2 col-md-4 col-sm-12">
                                        <div class="text-white m-auto">
                                            <div class="image-hover-text-container">
                                                <div class="image-hover-image">
                                                    <img class="img-fluid rounded-5" src="{{ $photo->temporaryUrl() }}"
                                                        alt="" srcset="">
                                                </div>
                                                <div class="image-hover-text">
                                                    <div class="image-hover-text-bubble rounded-5">
                                                        <span wire:click="deleteTempPhoto({{ $index }})"
                                                            class="image-hover-text-title d-flex justify-content-center align-items-center h-100 "
                                                            role="button">
                                                            <i class="fa-regular fa-trash-can fa-lg "></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row mx-4 my-2 ">
                                    @foreach ($features as $name => $value)
                                    <div class="form-check col-auto d-flex align-items-center">
                                        <input class="form-check-input shadow-sm" style="padding: 0.7rem;"
                                            wire:model="features.{{ $name }}" {{ $value ? 'checked' :'' }}
                                            type="checkbox" id="{{ $name }}">
                                        <label class="form-check-label mx-1" for="{{ $name }}">
                                            @lang('rooms.'.$name)
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-12 px-lg-2 p-0">
                                <button type="button"
                                    class="btn bg-white py-3 rounded-4 my-3 w-100 shadow fw-bold btn-color-2"
                                    wire:click="cancel">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-xl-4 col-sm-12 px-lg-2 p-0">
                                <button type="button" wire:click="addRoom"
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