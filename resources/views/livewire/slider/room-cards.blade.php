<div class="owl-carousel">
    @forelse ($rooms as $room)
        <div  wire:key='room-{{ $room->id }}'>
            <label class="text-white">
                <input type="radio" class="btn-check" value="{{ $room->id }}" wire:model.live='room_id'>
                <div class="image-hover-text-container">
                    <div class="card-hover-image">
                        <div class="card mb-3 shadow border-0 rounded-4 w-100">
                            <div class="row g-0">
                                <div class="col-md-4 col-sm-12">
                                    <img src="{{ asset($room->media->first()->file_name) }}"
                                        style="width: -webkit-fill-available;" class="img-fluid border-img h-100"
                                        alt="...">
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title fs-4" style="font-size: 0.8rem;">
                                            {{ $room->name }}</h5>
                                        <p class="card-text" style="font-size: 0.8rem;">
                                            {{ $room->location }}</p>
                                        <hr class="my-1">
                                        <p class="card-text m-0">
                                            <small class="text-body-secondary fs-7 my-1">
                                                <i class="fa-regular fa-hourglass-half"></i>
                                                Free for 60 min
                                            </small>
                                        </p>
                                        <p class="card-text m-0">
                                            <small class="text-body-secondary fs-7 my-1">
                                                <i class="fa-solid fa-users"></i>
                                                Up to {{ $room->capacity }} Person
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-hover-text" style="height: 91%;">
                        <div class="card-hover-text-bubble rounded-4">
                            <span class="card-hover-text-title d-flex justify-content-center align-items-center h-100">
                                <i class="fa-regular fa-calendar-check fa-xl px-2"></i>
                                Book Room Now
                            </span>
                        </div>
                    </div>
                </div>
            </label>
        </div>
    @empty
        <p class="h6 fw-bold">No rooms found</p>
    @endforelse
</div>
