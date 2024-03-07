<div>

    {{-- rooms --}}
    <div class="row px-3">
        @forelse ($rooms as $room)
            <div class="col-lg-3" wire:key='room-{{ $room->id }}'>
                <label class="text-white" role="button" wire:click="toggleCreateModal({{ $room->id }})">
                    {{-- <input type="radio" class="btn-check" value="{{ $room->id }}" wire:model.live='room_id'> --}}
                    <div class="image-hover-text-container">
                        <div class="card-hover-image">
                            <div class="card mb-3 shadow border-0 rounded-4 w-100">
                                <div class="row g-0">
                                    <div class="col-md-4 col-sm-12">
                                        <img src="{{ asset($room->media->first()->file_name) }}"
                                            class="border-img mw-100 h-100" alt="...">
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card-body mw-100" style="width: 200px;">
                                            <h5 class="card-title" style="font-size: 0.8rem;">
                                                {{ $room->name }}</h5>
                                            <p class="card-text" style="font-size: 0.8rem;">
                                                {{ $room->location }}</p>
                                            <hr class="my-1">
                                            {{-- <p class="card-text m-0">
                                                <small class="text-body-secondary" style="font-size: 0.8rem;">
                                                    <i class="fa-regular fa-hourglass-half"></i>
                                                </small>
                                            </p> --}}
                                            <p class="card-text m-0">
                                                <small class="text-body-secondary" style="font-size: 0.7rem;">
                                                    <i class="fa-solid fa-users"></i>
                                                    Up to {{ $room->capacity }} Person
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-hover-text" style="height: 94.5%;" role="button">
                            <div class="card-hover-text-bubble rounded-4">
                                <span
                                    class="card-hover-text-title d-flex justify-content-center align-items-center h-100">
                                    <i class="fa-regular fa-calendar-check fa-xl px-2"></i> Book Room Now
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
    {{-- end rooms --}}

    {{-- Create Meeting --}}
    @livewire('meetings.create', [
        'in_home' => true,
        'openCreateModal' => $openCreateModal,
        'room_id' => $room_id,
    ])
    {{-- end Create Meeting --}}
</div>
