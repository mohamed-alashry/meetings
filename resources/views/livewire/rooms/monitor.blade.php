<section class="section-contct-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="line-bookings row mb-3 px-1 g-3">
                    <span class="input-form-login col-lg col-lg-6 col-md-12 col-sm-12">
                        <h5 class="card-title">My Rooms Meetings</h5>
                        <p class="card-text">Don’t Miss Your Appointments</p>
                    </span>
                    <div class="input-form-login col-lg col-md-12 col-sm-12">
                        <x-input.date wire:model="start_date"
                            class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                            wire:change="$refresh" />
                    </div>
                    <div class="input-form-login col-lg col-md-12 col-sm-12">
                        <i class="fa-brands fa-buromobelexperte a-lg icon mt-3 text-dark"></i>
                        <select class="input-field form-control my-3 px-5 py-3 rounded-4 shadow-sm"
                            wire:model.live.debounce.150ms="room_id" wire:change="$refresh">
                            <option value="all">All Rooms</option>
                            @forelse ($select_rooms as $room)
                                <option value="{{ $room->id }}" wire:key='room-{{ $room->id }}'>
                                    {{ $room->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="line-cards mt-4">
                </div>
            </div>
        </div>
    </div>
    @if (hasPermissionUser('read_meeting'))
        @forelse ($rooms as $room)
            <div class="container-fluid" wire:key='room-list-{{ $room->id }}'>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="line-bookings row my-3 px-1">
                            <span class="col-lg-6 col-md-6 col-sm-12">
                                <h5 class="card-title">{{ $room->name ?? '' }}</h5>
                                <p class="card-text">Don’t Miss Your Appointments</p>
                            </span>
                        </div>
                        <div class="line-cards">
                            <div class="row">
                                @forelse ($room->meetings->take(15) as $meeting)
                                    @livewire('meetings.card', ['meeting' => $meeting, 'room' => $room], key('card-' . $meeting->id))
                                @empty
                                    @if (hasPermissionUser('create_meeting'))
                                        <div class="card m-2 rounded-3">
                                            <div class="card-body p-5 m-4 m-auto">
                                                <h4 class="card-title">Not Found Upcoming Meetings in this room</h4>
                                                <div class="col-6 m-auto mt-4">
                                                    @livewire('meetings.create', ['room_id' => $room->id], key('create-' . $room->id))
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    @endif
</section>
